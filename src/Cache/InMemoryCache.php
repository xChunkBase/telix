<?php
declare(strict_types=1);

namespace Telix\Cache;

use Psr\SimpleCache\CacheInterface;

final class InMemoryCache implements CacheInterface
{
    private array $items = [];

    public function get(string $key, mixed $default = null): mixed
    {
        $item = $this->items[$key] ?? null;

        if ($item === null) {
            return $default;
        }

        if ($item['expiresAt'] !== null && $item['expiresAt'] < microtime(true)) {
            unset($this->items[$key]);

            return $default;
        }

        return $item['value'];
    }

    public function set(string $key, mixed $value, null|int|\DateInterval $ttl = null): bool
    {
        $this->items[$key] = ['value' => $value, 'expiresAt' => self::expiry($ttl)];

        return true;
    }

    public function delete(string $key): bool
    {
        unset($this->items[$key]);

        return true;
    }

    public function clear(): bool
    {
        $this->items = [];

        return true;
    }

    public function getMultiple(iterable $keys, mixed $default = null): iterable
    {
        $values = [];

        foreach ($keys as $key) {
            $values[$key] = $this->get($key, $default);
        }

        return $values;
    }

    public function setMultiple(iterable $values, null|int|\DateInterval $ttl = null): bool
    {
        foreach ($values as $key => $value) {
            $this->set((string) $key, $value, $ttl);
        }

        return true;
    }

    public function deleteMultiple(iterable $keys): bool
    {
        foreach ($keys as $key) {
            $this->delete($key);
        }

        return true;
    }

    public function has(string $key): bool
    {
        return $this->get($key, $this) !== $this;
    }

    private static function expiry(null|int|\DateInterval $ttl): ?float
    {
        if ($ttl === null) {
            return null;
        }

        $seconds = $ttl instanceof \DateInterval
            ? (float) (new \DateTimeImmutable())->add($ttl)->getTimestamp() - microtime(true)
            : (float) $ttl;

        return microtime(true) + $seconds;
    }
}
