<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait TransferGift
{
    public function transferGift(
        string $businessConnectionId,
        string $ownedGiftId,
        int    $newOwnerChatId,
        ?int   $starCount            = null
    ): bool
    {
        return $this->call(new RawMethod('transferGift', [
            'business_connection_id' => $businessConnectionId,
            'owned_gift_id'          => $ownedGiftId,
            'new_owner_chat_id'      => $newOwnerChatId,
            'star_count'             => $starCount,
        ], ResponseMap::of('transferGift')));
    }
}
