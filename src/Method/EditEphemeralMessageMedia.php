<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditEphemeralMessageMedia
{
    public function editEphemeralMessageMedia(
        int|string $chatId,
        int        $receiverUserId,
        int        $ephemeralMessageId,
        mixed      $media,
        mixed      $replyMarkup        = null
    ): bool
    {
        return $this->call(new RawMethod('editEphemeralMessageMedia', [
            'chat_id'              => $chatId,
            'receiver_user_id'     => $receiverUserId,
            'ephemeral_message_id' => $ephemeralMessageId,
            'media'                => $media,
            'reply_markup'         => $replyMarkup,
        ], ResponseMap::of('editEphemeralMessageMedia')));
    }
}
