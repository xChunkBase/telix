<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ConvertGiftToStars
{
    public function convertGiftToStars(
        string $businessConnectionId,
        string $ownedGiftId
    ): bool
    {
        return $this->call(new RawMethod('convertGiftToStars', [
            'business_connection_id' => $businessConnectionId,
            'owned_gift_id'          => $ownedGiftId,
        ], ResponseMap::of('convertGiftToStars')));
    }
}
