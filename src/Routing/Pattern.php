<?php
declare(strict_types=1);

namespace Telix\Routing;

final class Pattern
{
    public static function compile(string $pattern): array
    {
        $names = [];
        $regex = '';
        $parts = preg_split('~(\{\w+\})~', $pattern, -1, \PREG_SPLIT_DELIM_CAPTURE | \PREG_SPLIT_NO_EMPTY);

        foreach ((array) $parts as $part) {
            if (\is_string($part) && preg_match('~^\{(\w+)\}$~', $part, $matches) === 1) {
                $names[] = $matches[1];
                $regex .= '(?<' . $matches[1] . '>[^:]+)';
            } else {
                $regex .= preg_quote((string) $part, '~');
            }
        }

        return ['regex' => '~^' . $regex . '$~u', 'names' => $names];
    }
}
