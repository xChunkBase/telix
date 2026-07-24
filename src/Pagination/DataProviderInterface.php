<?php
declare(strict_types=1);

namespace Telix\Pagination;

use Telix\Bot\Context;

interface DataProviderInterface
{
    public function count(Context $ctx): int;

    public function slice(int $offset, int $limit, Context $ctx): array;
}
