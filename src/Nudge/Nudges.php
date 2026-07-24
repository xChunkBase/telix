<?php
declare(strict_types=1);

namespace Telix\Nudge;

use Psr\Log\NullLogger;
use Telix\Client\BotApi;
use Psr\Log\LoggerInterface;
use Telix\Conversation\StateStore;
use Psr\SimpleCache\CacheInterface;

final class Nudges
{
    public const MAX_DELAY = 86_400;

    private array $handlers = [];

    public function __construct(
        private readonly CacheInterface $cache,
        private readonly string         $key   = 'telix.nudges'
    )
    {
    }

    public function on(string $name, callable $handler): void
    {
        $this->handlers[$name] = $handler(...);
    }

    public function schedule(int|string $chatId, string $name, int $delaySeconds, array $data = [], ?string $ifStep = null, ?int $userId = null): void
    {
        $pending                      = $this->all();
        $pending["{$chatId}:{$name}"] = [
            'chat' => $chatId,
            'user' => $userId ?? (\is_int($chatId) ? $chatId : null),
            'name' => $name,
            'due'  => time() + max(1, min($delaySeconds, self::MAX_DELAY)),
            'step' => $ifStep,
            'data' => $data,
        ];
        $this->save($pending);
    }

    public function cancel(int|string $chatId, string $name): void
    {
        $pending = $this->all();
        unset($pending["{$chatId}:{$name}"]);
        $this->save($pending);
    }

    public function pending(): int
    {
        return \count($this->all());
    }

    public function fire(BotApi $api, ?StateStore $state = null, LoggerInterface $logger = new NullLogger()): int
    {
        $pending = $this->all();

        if ($pending === []) {
            return 0;
        }

        $now   = time();
        $fired = 0;

        foreach ($pending as $id => $nudge) {
            if ($nudge['due'] > $now) {
                continue;
            }

            unset($pending[$id]);

            if ($nudge['step'] !== null) {
                $userId = $nudge['user'];

                if (!\is_int($userId) || $state === null || $state->step($userId) !== $nudge['step']) {
                    continue;
                }
            }

            $handler = $this->handlers[$nudge['name']] ?? null;

            if ($handler === null) {
                $logger->warning('Nudge "{name}" fired but no handler is registered.', ['name' => $nudge['name']]);
                continue;
            }

            try {
                $handler($nudge['chat'], $nudge['data'], $api);
                ++$fired;
            } catch (\Throwable $exception) {
                $logger->error('Nudge "{name}" for chat {chat} failed: {error}', [
                    'name'  => $nudge['name'],
                    'chat'  => $nudge['chat'],
                    'error' => $exception->getMessage(),
                ]);
            }
        }

        $this->save($pending);

        return $fired;
    }

    private function all(): array
    {
        $pending = $this->cache->get($this->key);

        return \is_array($pending) ? $pending : [];
    }

    private function save(array $pending): void
    {
        if ($pending === []) {
            $this->cache->delete($this->key);
        } else {
            $this->cache->set($this->key, $pending, self::MAX_DELAY);
        }
    }
}
