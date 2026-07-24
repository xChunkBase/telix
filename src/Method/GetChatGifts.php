<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetChatGifts
{
    public function getChatGifts(
        int|string $chatId,
        ?bool      $excludeUnsaved              = null,
        ?bool      $excludeSaved                = null,
        ?bool      $excludeUnlimited            = null,
        ?bool      $excludeLimitedUpgradable    = null,
        ?bool      $excludeLimitedNonUpgradable = null,
        ?bool      $excludeFromBlockchain       = null,
        ?bool      $excludeUnique               = null,
        ?bool      $sortByPrice                 = null,
        ?string    $offset                      = null,
        ?int       $limit                       = null
    ): \Telix\Type\OwnedGifts
    {
        return $this->call(new RawMethod('getChatGifts', [
            'chat_id'                        => $chatId,
            'exclude_unsaved'                => $excludeUnsaved,
            'exclude_saved'                  => $excludeSaved,
            'exclude_unlimited'              => $excludeUnlimited,
            'exclude_limited_upgradable'     => $excludeLimitedUpgradable,
            'exclude_limited_non_upgradable' => $excludeLimitedNonUpgradable,
            'exclude_from_blockchain'        => $excludeFromBlockchain,
            'exclude_unique'                 => $excludeUnique,
            'sort_by_price'                  => $sortByPrice,
            'offset'                         => $offset,
            'limit'                          => $limit,
        ], ResponseMap::of('getChatGifts')));
    }
}
