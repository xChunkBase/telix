<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditEphemeralMessageCaption
{
    public function editEphemeralMessageCaption(
        int|string                  $chatId,
        int                         $receiverUserId,
        int                         $ephemeralMessageId,
        ?string                     $caption            = null,
        ?\Telix\Type\Enum\ParseMode $parseMode          = null,
        ?array                      $captionEntities    = null,
        mixed                       $replyMarkup        = null
    ): bool
    {
        return $this->call(new RawMethod('editEphemeralMessageCaption', [
            'chat_id'              => $chatId,
            'receiver_user_id'     => $receiverUserId,
            'ephemeral_message_id' => $ephemeralMessageId,
            'caption'              => $caption,
            'parse_mode'           => $parseMode,
            'caption_entities'     => $captionEntities,
            'reply_markup'         => $replyMarkup,
        ], ResponseMap::of('editEphemeralMessageCaption')));
    }
}
