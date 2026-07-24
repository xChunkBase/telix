<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;

final class CallableFilter extends Filter
{
    private readonly \Closure $predicate;

    public function __construct(callable $predicate)
    {
        $this->predicate = $predicate(...);
    }

    public function matches(Context $ctx): bool
    {
        return (bool) ($this->predicate)($ctx);
    }
}
