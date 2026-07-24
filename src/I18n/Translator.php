<?php
declare(strict_types=1);

namespace Telix\I18n;

final class Translator
{
    private array $catalogs = [];

    public function __construct(
        private readonly string $defaultLocale  = 'en',
        private readonly string $fallbackLocale = 'en'
    )
    {
    }

    public function add(string $locale, array $messages): self
    {
        $this->catalogs[$locale] = array_merge(
            $this->catalogs[$locale] ?? [],
            self::flatten($messages)
        );

        return $this;
    }

    public function loadDirectory(string $directory): self
    {
        if (!is_dir($directory)) {
            throw new \InvalidArgumentException("Translation directory not found: {$directory}");
        }

        foreach (new \FilesystemIterator($directory) as $file) {
            if (!$file instanceof \SplFileInfo) {
                continue;
            }

            $locale = $file->getBasename('.' . $file->getExtension());

            if ($file->getExtension() === 'php') {
                /** @psalm-suppress UnresolvableInclude */
                $messages = require $file->getPathname();

                if (\is_array($messages)) {
                    $this->add($locale, $messages);
                }
            } elseif ($file->getExtension() === 'json') {
                $messages = json_decode((string) file_get_contents($file->getPathname()), true);

                if (\is_array($messages)) {
                    $this->add($locale, $messages);
                }
            }
        }

        return $this;
    }

    public function locales(): array
    {
        return array_keys($this->catalogs);
    }

    public function has(string $locale): bool
    {
        return isset($this->catalogs[$locale]);
    }

    public function defaultLocale(): string
    {
        return $this->defaultLocale;
    }

    public function t(string $key, array $params = [], ?string $locale = null): string
    {
        $locale ??= $this->defaultLocale;

        $message = $this->catalogs[$locale][$key]
            ?? $this->catalogs[$this->fallbackLocale][$key]
            ?? null;

        if ($message === null) {
            return $key;
        }

        if ($params === []) {
            return $message;
        }

        if (\extension_loaded('intl') && preg_match('~\{\s*\w+\s*,~', $message) === 1) {
            $formatted = \MessageFormatter::formatMessage($locale, $message, $params);

            if ($formatted !== false) {
                return $formatted;
            }
        }

        $replacements = [];

        foreach ($params as $name => $value) {
            $replacements['{' . $name . '}'] = (string) (\is_scalar($value) ? $value : json_encode($value));
        }

        return strtr($message, $replacements);
    }

    private static function flatten(array $messages, string $prefix = ''): array
    {
        $flat = [];

        foreach ($messages as $key => $value) {
            $fullKey = $prefix === '' ? (string) $key : "{$prefix}.{$key}";

            if (\is_array($value)) {
                $flat += self::flatten($value, $fullKey);
            } else {
                $flat[$fullKey] = (string) $value;
            }
        }

        return $flat;
    }
}
