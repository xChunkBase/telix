<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendGift
{
    public function sendGift(
        string          $giftId,
        ?int            $userId        = null,
        int|string|null $chatId        = null,
        ?bool           $payForUpgrade = null,
        ?string         $text          = null,
        ?string         $textParseMode = null,
        ?array          $textEntities  = null
    ): bool
    {
        return $this->call(new RawMethod('sendGift', [
            'gift_id'         => $giftId,
            'user_id'         => $userId,
            'chat_id'         => $chatId,
            'pay_for_upgrade' => $payForUpgrade,
            'text'            => $text,
            'text_parse_mode' => $textParseMode,
            'text_entities'   => $textEntities,
        ], ResponseMap::of('sendGift')));
    }
}
