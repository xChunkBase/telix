<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetBusinessAccountGifts
{
    public function getBusinessAccountGifts(
        string  $businessConnectionId,
        ?bool   $excludeUnsaved              = null,
        ?bool   $excludeSaved                = null,
        ?bool   $excludeUnlimited            = null,
        ?bool   $excludeLimitedUpgradable    = null,
        ?bool   $excludeLimitedNonUpgradable = null,
        ?bool   $excludeUnique               = null,
        ?bool   $excludeFromBlockchain       = null,
        ?bool   $sortByPrice                 = null,
        ?string $offset                      = null,
        ?int    $limit                       = null
    ): \Telix\Type\OwnedGifts
    {
        return $this->call(new RawMethod('getBusinessAccountGifts', [
            'business_connection_id'         => $businessConnectionId,
            'exclude_unsaved'                => $excludeUnsaved,
            'exclude_saved'                  => $excludeSaved,
            'exclude_unlimited'              => $excludeUnlimited,
            'exclude_limited_upgradable'     => $excludeLimitedUpgradable,
            'exclude_limited_non_upgradable' => $excludeLimitedNonUpgradable,
            'exclude_unique'                 => $excludeUnique,
            'exclude_from_blockchain'        => $excludeFromBlockchain,
            'sort_by_price'                  => $sortByPrice,
            'offset'                         => $offset,
            'limit'                          => $limit,
        ], ResponseMap::of('getBusinessAccountGifts')));
    }
}
