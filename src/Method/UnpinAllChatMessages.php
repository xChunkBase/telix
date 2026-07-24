<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UnpinAllChatMessages
{
    public function unpinAllChatMessages(int|string $chatId): bool
    {
        return $this->call(new RawMethod('unpinAllChatMessages', [
            'chat_id' => $chatId,
        ], ResponseMap::of('unpinAllChatMessages')));
    }
}
