<?php
declare(strict_types=1);

namespace Telix\Cache;

use Psr\SimpleCache\CacheInterface;

final class FileCache implements CacheInterface
{
    public function __construct(
        private readonly string $directory
    )
    {
        if (!is_dir($directory) && !mkdir($directory, 0770, true) && !is_dir($directory)) {
            throw new \RuntimeException("Cannot create cache directory: {$directory}");
        }
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $path = $this->path($key);

        if (!is_file($path)) {
            return $default;
        }

        $item = unserialize((string) file_get_contents($path), ['allowed_classes' => true]);

        if (!\is_array($item) || !\array_key_exists('value', $item)) {
            return $default;
        }

        if ($item['expiresAt'] !== null && $item['expiresAt'] < time()) {
            @unlink($path);

            return $default;
        }

        return $item['value'];
    }

    public function set(string $key, mixed $value, null|int|\DateInterval $ttl = null): bool
    {
        $expiresAt = null;

        if ($ttl instanceof \DateInterval) {
            $expiresAt = (new \DateTimeImmutable())->add($ttl)->getTimestamp();
        } elseif (\is_int($ttl)) {
            $expiresAt = time() + $ttl;
        }

        return file_put_contents(
            $this->path($key),
            serialize(['value' => $value, 'expiresAt' => $expiresAt]),
            \LOCK_EX
        ) !== false;
    }

    public function delete(string $key): bool
    {
        $path = $this->path($key);

        return !is_file($path) || unlink($path);
    }

    public function clear(): bool
    {
        $files = glob($this->directory . '/*.cache');

        foreach ($files === false ? [] : $files as $file) {
            @unlink($file);
        }

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
        $ok = true;

        foreach ($values as $key => $value) {
            $ok = $this->set((string) $key, $value, $ttl) && $ok;
        }

        return $ok;
    }

    public function deleteMultiple(iterable $keys): bool
    {
        $ok = true;

        foreach ($keys as $key) {
            $ok = $this->delete($key) && $ok;
        }

        return $ok;
    }

    public function has(string $key): bool
    {
        return $this->get($key, $this) !== $this;
    }

    private function path(string $key): string
    {
        return $this->directory . '/' . hash('xxh128', $key) . '.cache';
    }
}
