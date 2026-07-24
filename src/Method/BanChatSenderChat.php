<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait BanChatSenderChat
{
    public function banChatSenderChat(
        int|string $chatId,
        int        $senderChatId
    ): bool
    {
        return $this->call(new RawMethod('banChatSenderChat', [
            'chat_id'        => $chatId,
            'sender_chat_id' => $senderChatId,
        ], ResponseMap::of('banChatSenderChat')));
    }
}
