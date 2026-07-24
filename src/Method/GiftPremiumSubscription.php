<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GiftPremiumSubscription
{
    public function giftPremiumSubscription(
        int     $userId,
        int     $monthCount,
        int     $starCount,
        ?string $text          = null,
        ?string $textParseMode = null,
        ?array  $textEntities  = null
    ): bool
    {
        return $this->call(new RawMethod('giftPremiumSubscription', [
            'user_id'         => $userId,
            'month_count'     => $monthCount,
            'star_count'      => $starCount,
            'text'            => $text,
            'text_parse_mode' => $textParseMode,
            'text_entities'   => $textEntities,
        ], ResponseMap::of('giftPremiumSubscription')));
    }
}
