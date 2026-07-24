<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetBusinessAccountBio
{
    public function setBusinessAccountBio(
        string  $businessConnectionId,
        ?string $bio                  = null
    ): bool
    {
        return $this->call(new RawMethod('setBusinessAccountBio', [
            'business_connection_id' => $businessConnectionId,
            'bio'                    => $bio,
        ], ResponseMap::of('setBusinessAccountBio')));
    }
}
