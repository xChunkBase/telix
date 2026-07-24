<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteMessageReaction
{
    public function deleteMessageReaction(
        int|string $chatId,
        int        $messageId,
        ?int       $userId      = null,
        ?int       $actorChatId = null
    ): bool
    {
        return $this->call(new RawMethod('deleteMessageReaction', [
            'chat_id'       => $chatId,
            'message_id'    => $messageId,
            'user_id'       => $userId,
            'actor_chat_id' => $actorChatId,
        ], ResponseMap::of('deleteMessageReaction')));
    }
}
