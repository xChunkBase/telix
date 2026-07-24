<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetUserGifts
{
    public function getUserGifts(
        int     $userId,
        ?bool   $excludeUnlimited            = null,
        ?bool   $excludeLimitedUpgradable    = null,
        ?bool   $excludeLimitedNonUpgradable = null,
        ?bool   $excludeFromBlockchain       = null,
        ?bool   $excludeUnique               = null,
        ?bool   $sortByPrice                 = null,
        ?string $offset                      = null,
        ?int    $limit                       = null
    ): \Telix\Type\OwnedGifts
    {
        return $this->call(new RawMethod('getUserGifts', [
            'user_id'                        => $userId,
            'exclude_unlimited'              => $excludeUnlimited,
            'exclude_limited_upgradable'     => $excludeLimitedUpgradable,
            'exclude_limited_non_upgradable' => $excludeLimitedNonUpgradable,
            'exclude_from_blockchain'        => $excludeFromBlockchain,
            'exclude_unique'                 => $excludeUnique,
            'sort_by_price'                  => $sortByPrice,
            'offset'                         => $offset,
            'limit'                          => $limit,
        ], ResponseMap::of('getUserGifts')));
    }
}
