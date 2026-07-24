<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;

final class TextMatches extends Filter
{
    private const MODE_ANY      = 'any';
    private const MODE_EXACT    = 'exact';
    private const MODE_CONTAINS = 'contains';
    private const MODE_REGEX    = 'regex';

    private function __construct(
        private readonly string $mode,
        private readonly string $needle = ''
    )
    {
    }

    public static function any(): self
    {
        return new self(self::MODE_ANY);
    }

    public static function exact(string $text): self
    {
        return new self(self::MODE_EXACT, $text);
    }

    public static function contains(string $needle): self
    {
        return new self(self::MODE_CONTAINS, $needle);
    }

    public static function regex(string $pattern): self
    {
        return new self(self::MODE_REGEX, $pattern);
    }

    public function matches(Context $ctx): bool
    {
        $text = $ctx->update->message?->text;

        if ($text === null) {
            return false;
        }

        switch ($this->mode) {
            case self::MODE_ANY:
                return $text !== '' && !str_starts_with($text, '/');

            case self::MODE_EXACT:
                return $text === $this->needle;

            case self::MODE_CONTAINS:
                return mb_stripos($text, $this->needle) !== false;

            case self::MODE_REGEX:
                if ($this->needle === '' || preg_match($this->needle, $text, $matches) !== 1) {
                    return false;
                }

                foreach ($matches as $key => $value) {
                    if (\is_string($key)) {
                        $ctx->setParam($key, $value);
                    }
                }

                $ctx->setParam('matches', $matches);

                return true;
        }

        return false;
    }
}
