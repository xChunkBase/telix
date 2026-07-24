<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetBusinessAccountName
{
    public function setBusinessAccountName(
        string  $businessConnectionId,
        string  $firstName,
        ?string $lastName             = null
    ): bool
    {
        return $this->call(new RawMethod('setBusinessAccountName', [
            'business_connection_id' => $businessConnectionId,
            'first_name'             => $firstName,
            'last_name'              => $lastName,
        ], ResponseMap::of('setBusinessAccountName')));
    }
}
