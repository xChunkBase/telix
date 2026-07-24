<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait RestrictChatMember
{
    public function restrictChatMember(
        int|string $chatId,
        int        $userId,
        mixed      $permissions,
        ?bool      $useIndependentChatPermissions = null,
        ?int       $untilDate                     = null
    ): bool
    {
        return $this->call(new RawMethod('restrictChatMember', [
            'chat_id'                          => $chatId,
            'user_id'                          => $userId,
            'permissions'                      => $permissions,
            'use_independent_chat_permissions' => $useIndependentChatPermissions,
            'until_date'                       => $untilDate,
        ], ResponseMap::of('restrictChatMember')));
    }
}
