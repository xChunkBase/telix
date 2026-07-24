<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait PinChatMessage
{
    public function pinChatMessage(
        int|string $chatId,
        int        $messageId,
        ?string    $businessConnectionId = null,
        ?bool      $disableNotification  = null
    ): bool
    {
        return $this->call(new RawMethod('pinChatMessage', [
            'chat_id'                => $chatId,
            'message_id'             => $messageId,
            'business_connection_id' => $businessConnectionId,
            'disable_notification'   => $disableNotification,
        ], ResponseMap::of('pinChatMessage')));
    }
}
