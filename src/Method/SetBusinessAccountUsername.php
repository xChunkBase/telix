<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetBusinessAccountUsername
{
    public function setBusinessAccountUsername(
        string  $businessConnectionId,
        ?string $username             = null
    ): bool
    {
        return $this->call(new RawMethod('setBusinessAccountUsername', [
            'business_connection_id' => $businessConnectionId,
            'username'               => $username,
        ], ResponseMap::of('setBusinessAccountUsername')));
    }
}
