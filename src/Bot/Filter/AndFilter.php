<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;

final class AndFilter extends Filter
{
    private readonly array $filters;

    public function __construct(Filter ...$filters)
    {
        $this->filters = $filters;
    }

    public function matches(Context $ctx): bool
    {
        foreach ($this->filters as $filter) {
            if (!$filter->matches($ctx)) {
                return false;
            }
        }

        return true;
    }
}
