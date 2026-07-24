<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UnpinChatMessage
{
    public function unpinChatMessage(
        int|string $chatId,
        ?string    $businessConnectionId = null,
        ?int       $messageId            = null
    ): bool
    {
        return $this->call(new RawMethod('unpinChatMessage', [
            'chat_id'                => $chatId,
            'business_connection_id' => $businessConnectionId,
            'message_id'             => $messageId,
        ], ResponseMap::of('unpinChatMessage')));
    }
}
