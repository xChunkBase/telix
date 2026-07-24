<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetStarTransactions
{
    public function getStarTransactions(
        ?int $offset = null,
        ?int $limit  = null
    ): \Telix\Type\StarTransactions
    {
        return $this->call(new RawMethod('getStarTransactions', [
            'offset' => $offset,
            'limit'  => $limit,
        ], ResponseMap::of('getStarTransactions')));
    }
}
