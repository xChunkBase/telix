<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait BanChatMember
{
    public function banChatMember(
        int|string $chatId,
        int        $userId,
        ?int       $untilDate      = null,
        ?bool      $revokeMessages = null
    ): bool
    {
        return $this->call(new RawMethod('banChatMember', [
            'chat_id'         => $chatId,
            'user_id'         => $userId,
            'until_date'      => $untilDate,
            'revoke_messages' => $revokeMessages,
        ], ResponseMap::of('banChatMember')));
    }
}
