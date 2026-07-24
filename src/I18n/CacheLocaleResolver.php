<?php
declare(strict_types=1);

namespace Telix\I18n;

use Telix\Type\Update;
use Psr\SimpleCache\CacheInterface;

final class CacheLocaleResolver implements LocaleResolverInterface
{
    public function __construct(
        private readonly CacheInterface $cache,
        private readonly string         $prefix = 'telix.locale.'
    )
    {
    }

    public function resolve(Update $update): ?string
    {
        $userId = $update->from()?->id;

        if ($userId === null) {
            return null;
        }

        $locale = $this->cache->get($this->prefix . $userId);

        return \is_string($locale) ? $locale : null;
    }

    public function set(int $userId, string $locale): void
    {
        $this->cache->set($this->prefix . $userId, $locale);
    }
}
