<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetChatMember
{
    public function getChatMember(
        int|string $chatId,
        int        $userId
    ): \Telix\Type\ChatMember
    {
        return $this->call(new RawMethod('getChatMember', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ], ResponseMap::of('getChatMember')));
    }
}
