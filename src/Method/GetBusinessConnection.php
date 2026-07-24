<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetBusinessConnection
{
    public function getBusinessConnection(string $businessConnectionId): \Telix\Type\BusinessConnection
    {
        return $this->call(new RawMethod('getBusinessConnection', [
            'business_connection_id' => $businessConnectionId,
        ], ResponseMap::of('getBusinessConnection')));
    }
}
