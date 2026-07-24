<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetMyDefaultAdministratorRights
{
    public function getMyDefaultAdministratorRights(?bool $forChannels = null): \Telix\Type\ChatAdministratorRights
    {
        return $this->call(new RawMethod('getMyDefaultAdministratorRights', [
            'for_channels' => $forChannels,
        ], ResponseMap::of('getMyDefaultAdministratorRights')));
    }
}
