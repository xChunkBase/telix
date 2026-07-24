<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetBusinessAccountGiftSettings
{
    public function setBusinessAccountGiftSettings(
        string $businessConnectionId,
        bool   $showGiftButton,
        mixed  $acceptedGiftTypes
    ): bool
    {
        return $this->call(new RawMethod('setBusinessAccountGiftSettings', [
            'business_connection_id' => $businessConnectionId,
            'show_gift_button'       => $showGiftButton,
            'accepted_gift_types'    => $acceptedGiftTypes,
        ], ResponseMap::of('setBusinessAccountGiftSettings')));
    }
}
