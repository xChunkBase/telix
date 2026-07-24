<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeclineChatJoinRequest
{
    public function declineChatJoinRequest(
        int|string $chatId,
        int        $userId
    ): bool
    {
        return $this->call(new RawMethod('declineChatJoinRequest', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ], ResponseMap::of('declineChatJoinRequest')));
    }
}
