<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UnbanChatSenderChat
{
    public function unbanChatSenderChat(
        int|string $chatId,
        int        $senderChatId
    ): bool
    {
        return $this->call(new RawMethod('unbanChatSenderChat', [
            'chat_id'        => $chatId,
            'sender_chat_id' => $senderChatId,
        ], ResponseMap::of('unbanChatSenderChat')));
    }
}
