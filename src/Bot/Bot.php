<?php
declare(strict_types=1);

namespace Telix\Bot;

use Telix\Type\Update;
use Psr\Log\NullLogger;
use Telix\Nudge\Nudges;
use Telix\Client\BotApi;
use Telix\Memory\Memory;
use Telix\Plugin\Plugin;
use Telix\I18n\Translator;
use Telix\Type\BotCommand;
use Psr\Log\LoggerInterface;
use Telix\Bot\Filter\Filter;
use Telix\Bot\Filter\RawHas;
use Telix\Bot\Filter\StepIs;
use Telix\Bot\Filter\Command;
use Telix\Bot\Filter\UpdateIs;
use Telix\Cache\InMemoryCache;
use Telix\Type\Enum\ParseMode;
use Telix\Type\Enum\UpdateType;
use Telix\Bot\Filter\ButtonLabel;
use Telix\Bot\Filter\TextMatches;
use Telix\Bot\Filter\CallbackData;
use Telix\Bot\Middleware\Pipeline;
use Telix\Conversation\StateStore;
use Psr\SimpleCache\CacheInterface;
use Telix\Routing\AttributeScanner;
use Telix\Plugin\PluginConfigurator;
use Psr\Container\ContainerInterface;
use Telix\Exception\WebhookException;
use Telix\I18n\LocaleResolverInterface;
use Telix\Update\UpdateSourceInterface;
use Telix\Update\Webhook\WebhookSource;
use Telix\Update\Webhook\ResponseCloser;
use Telix\Bot\Middleware\FloodProtection;
use Telix\Bot\Middleware\CallableMiddleware;
use Telix\Bot\Middleware\MiddlewareInterface;
use Telix\Update\LongPolling\LongPollingSource;

final class Bot
{
    private readonly Router $router;
    /** @var list<MiddlewareInterface> */
    private array $middleware          = [];
    private array $commandDescriptions = [];
    private ?Memory $memory            = null;
    private ?Nudges $nudges            = null;

    public function __construct(
        private readonly BotApi              $api,
        private readonly LoggerInterface     $logger           = new NullLogger(),
        private readonly ?ContainerInterface $container        = null,
        private ?Translator                  $translator       = null,
        private ?LocaleResolverInterface     $localeResolver   = null,
        private readonly ?ParseMode          $defaultParseMode = null,
        private ?StateStore                  $state            = null,
        private ?CacheInterface              $cache            = null
    )
    {
        $this->router = new Router($container);
    }

    public function on(Filter $filter, callable|string|array $handler, int $priority = 0, array $middleware = []): self
    {
        $this->router->add($filter, $handler, $priority, $middleware);

        return $this;
    }

    public function command(string $name, callable|string|array $handler, string $description = '', int $priority = 0): self
    {
        if ($description !== '') {
            $this->commandDescriptions[ltrim($name, '/')] = $description;
        }

        return $this->on(Command::named($name), $handler, $priority);
    }

    public function callback(string $pattern, callable|string|array $handler, int $priority = 0): self
    {
        return $this->on(CallbackData::pattern($pattern), $handler, $priority);
    }

    public function hears(string $regex, callable|string|array $handler, int $priority = 0): self
    {
        return $this->on(TextMatches::regex($regex), $handler, $priority);
    }

    public function onText(string $text, callable|string|array $handler, int $priority = 0): self
    {
        return $this->on(TextMatches::exact($text), $handler, $priority);
    }

    public function onMessage(string $field, callable|string|array $handler, int $priority = 0): self
    {
        return $this->onUpdate("message.{$field}", $handler, $priority);
    }

    public function onStep(string $step, callable|string|array $handler, int $priority = -5): self
    {
        return $this->on(StepIs::pattern($this->state(), $step), $handler, $priority);
    }

    public function onUpdate(UpdateType|string $type, callable|string|array $handler, int $priority = 0): self
    {
        $filter = $type instanceof UpdateType ? new UpdateIs($type) : new RawHas($type);

        return $this->on($filter, $handler, $priority);
    }

    public function button(string $labelKey, callable|string|array $handler, ?string $command = null, int $priority = 0): self
    {
        if ($this->translator === null) {
            throw new \LogicException('button() needs a translator — pass one to the Bot (or Telix::bot()).');
        }

        $filter = new ButtonLabel($this->translator, $labelKey);

        if ($command !== null) {
            $filter = $filter->or(Command::named($command));
        }

        return $this->on($filter, $handler, $priority);
    }

    public function fallback(callable|string|array $handler): self
    {
        $this->router->fallback($handler);

        return $this;
    }

    public function middleware(MiddlewareInterface|callable $middleware): self
    {
        $this->middleware[] = $middleware instanceof MiddlewareInterface
            ? $middleware
            : new CallableMiddleware($middleware);

        return $this;
    }

    public function discover(string $directory): self
    {
        foreach ((new AttributeScanner())->scan($directory) as $route) {
            $this->router->add($route['filter'], $route['handler'], $route['priority'], $route['middleware']);

            if ($route['command'] !== null) {
                $this->commandDescriptions[$route['command'][0]] = $route['command'][1];
            }
        }

        return $this;
    }

    public function use(Plugin ...$plugins): self
    {
        foreach ($plugins as $plugin) {
            $plugin->configure(new PluginConfigurator($this));
        }

        return $this;
    }

    public function withTranslator(Translator $translator, ?LocaleResolverInterface $localeResolver = null): self
    {
        $this->translator = $translator;

        if ($localeResolver !== null) {
            $this->localeResolver = $localeResolver;
        }

        return $this;
    }

    public function api(): BotApi
    {
        return $this->api;
    }

    public function cache(): CacheInterface
    {
        return $this->cache ??= new InMemoryCache();
    }

    public function state(): StateStore
    {
        return $this->state ??= new StateStore($this->cache());
    }

    public function memory(): Memory
    {
        return $this->memory ??= new Memory($this->cache());
    }

    public function nudges(): Nudges
    {
        return $this->nudges ??= new Nudges($this->cache());
    }

    public function onNudge(string $name, callable $handler): self
    {
        $this->nudges()->on($name, $handler);

        return $this;
    }

    public function tick(): int
    {
        return $this->nudges()->fire($this->api, $this->state(), $this->logger);
    }

    public function protect(int $maxUpdates = 20, int $perSeconds = 10, int $muteFor = 30, ?callable $onFlood = null): self
    {
        return $this->middleware(new FloodProtection($this->memory(), $maxUpdates, $perSeconds, $muteFor, $onFlood));
    }

    public function translator(): ?Translator
    {
        return $this->translator;
    }

    public function commands(): array
    {
        return $this->commandDescriptions;
    }

    public function syncCommands(): bool
    {
        if ($this->commandDescriptions === []) {
            return false;
        }

        $commands = [];

        foreach ($this->commandDescriptions as $name => $description) {
            $commands[] = new BotCommand($name, $description);
        }

        return $this->api->setMyCommands($commands);
    }

    public function handle(Update $update): void
    {
        $locale = $this->localeResolver?->resolve($update);
        $ctx    = new Context($update, $this->api, $this->translator, $locale, $this->defaultParseMode, $this->state(), $this->memory(), $this->nudges());

        (new Pipeline($this->middleware, function (Context $c): void {
            if (!$this->router->dispatch($c)) {
                $this->logger->debug('No handler matched update {update_id} ({type}).', [
                    'update_id' => $c->update->updateId,
                    'type'      => $c->update->type()->value,
                ]);
            }
        }))->run($ctx);
    }

    public function poll(int $timeout = 30, ?array $allowedUpdates = null): void
    {
        $this->run(new LongPollingSource(
            $this->api,
            $timeout,
            allowedUpdates: $allowedUpdates,
            logger: $this->logger,
            onTick: fn () => $this->tick()
        ));
    }

    public function webhook(?string $secretToken = null, bool $defer = false): void
    {
        try {
            $source = WebhookSource::fromGlobals($secretToken);
        } catch (WebhookException $exception) {
            $this->logger->warning('Webhook request rejected: {error}', ['error' => $exception->getMessage()]);

            if (\PHP_SAPI !== 'cli') {
                http_response_code(403);
            }

            return;
        }

        if ($defer) {
            ResponseCloser::close();
        }

        $this->run($source);
    }

    public function run(UpdateSourceInterface $source): void
    {
        foreach ($source->updates() as $update) {
            try {
                $this->handle($update);
            } catch (\Throwable $exception) {
                $this->logger->error('Unhandled error on update {update_id}: {error}', [
                    'update_id' => $update->updateId,
                    'error'     => $exception->getMessage(),
                    'exception' => $exception,
                ]);
            }
        }
    }
}
