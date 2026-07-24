<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;

final class NotFilter extends Filter
{
    public function __construct(
        private readonly Filter $inner
    )
    {
    }

    public function matches(Context $ctx): bool
    {
        return !$this->inner->matches($ctx);
    }
}
