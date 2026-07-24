<?php
declare(strict_types=1);

namespace Telix\Plugin;

use Telix\Bot\Bot;
use Telix\Bot\Filter\Filter;
use Telix\Bot\Middleware\MiddlewareInterface;

final class PluginConfigurator
{
    public function __construct(
        private readonly Bot $bot
    )
    {
    }

    public function on(Filter $filter, callable|string|array $handler, int $priority = 0): self
    {
        $this->bot->on($filter, $handler, $priority);

        return $this;
    }

    public function command(string $name, callable|string|array $handler, string $description = ''): self
    {
        $this->bot->command($name, $handler, $description);

        return $this;
    }

    public function callback(string $pattern, callable|string|array $handler): self
    {
        $this->bot->callback($pattern, $handler);

        return $this;
    }

    public function button(string $labelKey, callable|string|array $handler, ?string $command = null, int $priority = 0): self
    {
        $this->bot->button($labelKey, $handler, $command, $priority);

        return $this;
    }

    public function middleware(MiddlewareInterface|callable $middleware): self
    {
        $this->bot->middleware($middleware);

        return $this;
    }

    public function handlers(string $directory): self
    {
        $this->bot->discover($directory);

        return $this;
    }

    public function translations(string $directory): self
    {
        $this->bot->translator()?->loadDirectory($directory);

        return $this;
    }

    public function bot(): Bot
    {
        return $this->bot;
    }
}
