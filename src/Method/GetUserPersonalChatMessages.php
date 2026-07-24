<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetUserPersonalChatMessages
{
    public function getUserPersonalChatMessages(
        int $userId,
        int $limit
    ): array
    {
        return $this->call(new RawMethod('getUserPersonalChatMessages', [
            'user_id' => $userId,
            'limit'   => $limit,
        ], ResponseMap::of('getUserPersonalChatMessages')));
    }
}
