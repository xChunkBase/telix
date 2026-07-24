<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditEphemeralMessageText
{
    public function editEphemeralMessageText(
        int|string                  $chatId,
        int                         $receiverUserId,
        int                         $ephemeralMessageId,
        string                      $text,
        ?\Telix\Type\Enum\ParseMode $parseMode          = null,
        ?array                      $entities           = null,
        mixed                       $linkPreviewOptions = null,
        mixed                       $replyMarkup        = null
    ): bool
    {
        return $this->call(new RawMethod('editEphemeralMessageText', [
            'chat_id'              => $chatId,
            'receiver_user_id'     => $receiverUserId,
            'ephemeral_message_id' => $ephemeralMessageId,
            'text'                 => $text,
            'parse_mode'           => $parseMode,
            'entities'             => $entities,
            'link_preview_options' => $linkPreviewOptions,
            'reply_markup'         => $replyMarkup,
        ], ResponseMap::of('editEphemeralMessageText')));
    }
}
