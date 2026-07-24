<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UpgradeGift
{
    public function upgradeGift(
        string $businessConnectionId,
        string $ownedGiftId,
        ?bool  $keepOriginalDetails  = null,
        ?int   $starCount            = null
    ): bool
    {
        return $this->call(new RawMethod('upgradeGift', [
            'business_connection_id' => $businessConnectionId,
            'owned_gift_id'          => $ownedGiftId,
            'keep_original_details'  => $keepOriginalDetails,
            'star_count'             => $starCount,
        ], ResponseMap::of('upgradeGift')));
    }
}
