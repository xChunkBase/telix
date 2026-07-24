<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteMessage
{
    public function deleteMessage(
        int|string $chatId,
        int        $messageId
    ): bool
    {
        return $this->call(new RawMethod('deleteMessage', [
            'chat_id'    => $chatId,
            'message_id' => $messageId,
        ], ResponseMap::of('deleteMessage')));
    }
}
