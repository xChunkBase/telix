<?php
declare(strict_types=1);

namespace Telix\Memory;

use Psr\SimpleCache\CacheInterface;

final class Memory
{
    public const MAX_TTL = 86_400;

    public function __construct(
        private readonly CacheInterface $cache,
        private readonly string         $prefix = 'telix.mem.'
    )
    {
    }

    public function set(string $key, mixed $value, int $ttl = 300): void
    {
        $ttl = max(1, min($ttl, self::MAX_TTL));
        $this->cache->set($this->prefix . $key, ['v' => $value, 'e' => time() + $ttl], $ttl);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $envelope = $this->cache->get($this->prefix . $key);

        if (!\is_array($envelope) || !\array_key_exists('v', $envelope)) {
            return $default;
        }

        if (($envelope['e'] ?? 0) <= time()) {
            $this->forget($key);

            return $default;
        }

        return $envelope['v'];
    }

    public function has(string $key): bool
    {
        return $this->get($key, $this) !== $this;
    }

    public function pull(string $key, mixed $default = null): mixed
    {
        $value = $this->get($key, $default);
        $this->forget($key);

        return $value;
    }

    public function forget(string $key): void
    {
        $this->cache->delete($this->prefix . $key);
    }

    public function increment(string $key, int $by = 1, int $ttl = 60): int
    {
        $envelope = $this->cache->get($this->prefix . $key);
        $now      = time();

        if (\is_array($envelope) && ($envelope['e'] ?? 0) > $now && \is_int($envelope['v'] ?? null)) {
            $envelope['v'] += $by;
            $this->cache->set($this->prefix . $key, $envelope, max(1, $envelope['e'] - $now));

            return $envelope['v'];
        }

        $this->set($key, $by, $ttl);

        return $by;
    }

    public function remaining(string $key): ?int
    {
        $envelope = $this->cache->get($this->prefix . $key);

        if (!\is_array($envelope)) {
            return null;
        }

        $left = ($envelope['e'] ?? 0) - time();

        return $left > 0 ? $left : null;
    }
}
