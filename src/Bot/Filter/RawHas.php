<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;

final class RawHas extends Filter
{
    public function __construct(
        private readonly string $path
    )
    {
    }

    public function matches(Context $ctx): bool
    {
        $value = $ctx->update->raw;

        foreach (explode('.', $this->path) as $segment) {
            if (!\is_array($value) || !\array_key_exists($segment, $value)) {
                return false;
            }

            $value = $value[$segment];
        }

        $ctx->setParam('raw', $value);

        return true;
    }
}
