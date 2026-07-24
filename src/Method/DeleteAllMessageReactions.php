<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteAllMessageReactions
{
    public function deleteAllMessageReactions(
        int|string $chatId,
        ?int       $userId      = null,
        ?int       $actorChatId = null
    ): bool
    {
        return $this->call(new RawMethod('deleteAllMessageReactions', [
            'chat_id'       => $chatId,
            'user_id'       => $userId,
            'actor_chat_id' => $actorChatId,
        ], ResponseMap::of('deleteAllMessageReactions')));
    }
}
