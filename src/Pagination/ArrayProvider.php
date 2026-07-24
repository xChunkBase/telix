<?php
declare(strict_types=1);

namespace Telix\Pagination;

use Telix\Bot\Context;

final readonly class ArrayProvider implements DataProviderInterface
{
    public function __construct(
        private array $items
    )
    {
    }

    public function count(Context $ctx): int
    {
        return \count($this->items);
    }

    public function slice(int $offset, int $limit, Context $ctx): array
    {
        return \array_slice($this->items, $offset, $limit);
    }
}
