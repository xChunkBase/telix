<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetChatMemberCount
{
    public function getChatMemberCount(int|string $chatId): int
    {
        return $this->call(new RawMethod('getChatMemberCount', [
            'chat_id' => $chatId,
        ], ResponseMap::of('getChatMemberCount')));
    }
}
