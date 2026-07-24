<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;

abstract class Filter
{
    abstract public function matches(Context $ctx): bool;

    public function and(self $other): self
    {
        return new AndFilter($this, $other);
    }

    public function or(self $other): self
    {
        return new OrFilter($this, $other);
    }

    public function not(): self
    {
        return new NotFilter($this);
    }

    public static function fn(callable $predicate): self
    {
        return new CallableFilter($predicate);
    }
}
