<?php
declare(strict_types=1);

namespace Telix\Conversation;

use Psr\SimpleCache\CacheInterface;

final class StateStore
{
    public const MAX_TTL = 86_400;

    public function __construct(
        private readonly CacheInterface $cache,
        private readonly string         $prefix     = 'telix.state.',
        private readonly int            $ttlSeconds = self::MAX_TTL
    )
    {
    }

    public function enter(int $userId, string $step, array $data = [], ?int $ttl = null): void
    {
        $ttl = max(1, min($ttl ?? $this->ttlSeconds, self::MAX_TTL));
        $this->cache->set($this->prefix . $userId, ['step' => $step, 'data' => $data], $ttl);
    }

    public function step(int $userId): ?string
    {
        $state = $this->cache->get($this->prefix . $userId);

        return \is_array($state) ? ($state['step'] ?? null) : null;
    }

    public function data(int $userId): array
    {
        $state = $this->cache->get($this->prefix . $userId);

        return \is_array($state) && \is_array($state['data'] ?? null) ? $state['data'] : [];
    }

    public function merge(int $userId, array $data): void
    {
        $step = $this->step($userId);

        if ($step !== null) {
            $this->enter($userId, $step, array_merge($this->data($userId), $data));
        }
    }

    public function advance(int $userId, string $step, array $data = [], ?int $ttl = null): void
    {
        $this->enter($userId, $step, array_merge($this->data($userId), $data), $ttl);
    }

    public function leave(int $userId): void
    {
        $this->cache->delete($this->prefix . $userId);
    }

    public function inConversation(int $userId): bool
    {
        return $this->step($userId) !== null;
    }
}
