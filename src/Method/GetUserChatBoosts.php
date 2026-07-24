<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetUserChatBoosts
{
    public function getUserChatBoosts(
        int|string $chatId,
        int        $userId
    ): \Telix\Type\UserChatBoosts
    {
        return $this->call(new RawMethod('getUserChatBoosts', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ], ResponseMap::of('getUserChatBoosts')));
    }
}
