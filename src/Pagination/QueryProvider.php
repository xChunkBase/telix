<?php
declare(strict_types=1);

namespace Telix\Pagination;

use Telix\Bot\Context;

final readonly class QueryProvider implements DataProviderInterface
{
    public function __construct(
        private \Closure $slice,
        private \Closure $count
    )
    {
    }

    public function count(Context $ctx): int
    {
        return ($this->count)($ctx);
    }

    public function slice(int $offset, int $limit, Context $ctx): array
    {
        return ($this->slice)($offset, $limit, $ctx);
    }
}
