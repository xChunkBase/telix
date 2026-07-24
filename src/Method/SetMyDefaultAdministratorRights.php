<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetMyDefaultAdministratorRights
{
    public function setMyDefaultAdministratorRights(
        mixed $rights      = null,
        ?bool $forChannels = null
    ): bool
    {
        return $this->call(new RawMethod('setMyDefaultAdministratorRights', [
            'rights'       => $rights,
            'for_channels' => $forChannels,
        ], ResponseMap::of('setMyDefaultAdministratorRights')));
    }
}
