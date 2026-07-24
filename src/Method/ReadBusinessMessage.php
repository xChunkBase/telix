<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ReadBusinessMessage
{
    public function readBusinessMessage(
        string $businessConnectionId,
        int    $chatId,
        int    $messageId
    ): bool
    {
        return $this->call(new RawMethod('readBusinessMessage', [
            'business_connection_id' => $businessConnectionId,
            'chat_id'                => $chatId,
            'message_id'             => $messageId,
        ], ResponseMap::of('readBusinessMessage')));
    }
}
