<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UnbanChatMember
{
    public function unbanChatMember(
        int|string $chatId,
        int        $userId,
        ?bool      $onlyIfBanned = null
    ): bool
    {
        return $this->call(new RawMethod('unbanChatMember', [
            'chat_id'        => $chatId,
            'user_id'        => $userId,
            'only_if_banned' => $onlyIfBanned,
        ], ResponseMap::of('unbanChatMember')));
    }
}
