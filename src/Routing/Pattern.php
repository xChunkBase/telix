<?php
declare(strict_types=1);

namespace Telix\Routing;

final class Pattern
{
    private const DEFAULT_BODY = '[^:]+';

    public static function compile(string $pattern): array
    {
        $names  = [];
        $regex  = '';
        $token  = '~\{(\w+)(?::([^}]+))?(\?)?\}~';
        $cursor = 0;

        while (preg_match($token, $pattern, $matches, \PREG_OFFSET_CAPTURE, $cursor) === 1) {
            $literal  = substr($pattern, $cursor, $matches[0][1] - $cursor);
            $name     = $matches[1][0];
            $body     = ($matches[2][0] ?? '') !== '' ? $matches[2][0] : self::DEFAULT_BODY;
            $optional = ($matches[3][0] ?? '') === '?';
            $names[]  = $name;

            if ($optional && $literal !== '' && !ctype_alnum($literal[-1])) {
                $regex .= preg_quote(substr($literal, 0, -1), '~');
                $regex .= '(?:' . preg_quote($literal[-1], '~') . '(?<' . $name . '>' . $body . '))?';
            } else {
                $regex .= preg_quote($literal, '~') . '(?<' . $name . '>' . $body . ')' . ($optional ? '?' : '');
            }

            $cursor = $matches[0][1] + \strlen($matches[0][0]);
        }

        $regex .= preg_quote(substr($pattern, $cursor), '~');

        return ['regex' => '~^' . $regex . '$~u', 'names' => $names];
    }
}
