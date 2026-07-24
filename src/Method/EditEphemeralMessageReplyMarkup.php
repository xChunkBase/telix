<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditEphemeralMessageReplyMarkup
{
    public function editEphemeralMessageReplyMarkup(
        int|string $chatId,
        int        $receiverUserId,
        int        $ephemeralMessageId,
        mixed      $replyMarkup        = null
    ): bool
    {
        return $this->call(new RawMethod('editEphemeralMessageReplyMarkup', [
            'chat_id'              => $chatId,
            'receiver_user_id'     => $receiverUserId,
            'ephemeral_message_id' => $ephemeralMessageId,
            'reply_markup'         => $replyMarkup,
        ], ResponseMap::of('editEphemeralMessageReplyMarkup')));
    }
}
