<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ApproveChatJoinRequest
{
    public function approveChatJoinRequest(
        int|string $chatId,
        int        $userId
    ): bool
    {
        return $this->call(new RawMethod('approveChatJoinRequest', [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ], ResponseMap::of('approveChatJoinRequest')));
    }
}
