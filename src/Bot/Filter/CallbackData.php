<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;
use Telix\Routing\Pattern;

final class CallbackData extends Filter
{
    /**
     * @param non-empty-string $regex
     */
    private function __construct(
        private readonly string $regex,
        private readonly array  $names = []
    )
    {
    }

    public static function pattern(string $pattern): self
    {
        $compiled = Pattern::compile($pattern);

        return new self($compiled['regex'], $compiled['names']);
    }

    public static function exact(string $data): self
    {
        return new self('~^' . preg_quote($data, '~') . '$~u');
    }

    public static function prefix(string $prefix): self
    {
        return new self('~^' . preg_quote($prefix, '~') . '~u');
    }

    public function matches(Context $ctx): bool
    {
        $data = $ctx->update->callbackQuery?->data;

        if ($data === null || preg_match($this->regex, $data, $matches) !== 1) {
            return false;
        }

        foreach ($this->names as $name) {
            $ctx->setParam($name, $matches[$name]);
        }

        return true;
    }
}
