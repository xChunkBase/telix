<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetChatPermissions
{
    public function setChatPermissions(
        int|string $chatId,
        mixed      $permissions,
        ?bool      $useIndependentChatPermissions = null
    ): bool
    {
        return $this->call(new RawMethod('setChatPermissions', [
            'chat_id'                          => $chatId,
            'permissions'                      => $permissions,
            'use_independent_chat_permissions' => $useIndependentChatPermissions,
        ], ResponseMap::of('setChatPermissions')));
    }
}
