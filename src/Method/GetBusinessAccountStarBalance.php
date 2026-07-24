<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetBusinessAccountStarBalance
{
    public function getBusinessAccountStarBalance(string $businessConnectionId): \Telix\Type\StarAmount
    {
        return $this->call(new RawMethod('getBusinessAccountStarBalance', [
            'business_connection_id' => $businessConnectionId,
        ], ResponseMap::of('getBusinessAccountStarBalance')));
    }
}
