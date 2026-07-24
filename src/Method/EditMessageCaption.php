<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditMessageCaption
{
    public function editMessageCaption(
        ?string                     $businessConnectionId  = null,
        int|string|null             $chatId                = null,
        ?int                        $messageId             = null,
        ?string                     $inlineMessageId       = null,
        ?string                     $caption               = null,
        ?\Telix\Type\Enum\ParseMode $parseMode             = null,
        ?array                      $captionEntities       = null,
        ?bool                       $showCaptionAboveMedia = null,
        mixed                       $replyMarkup           = null
    ): \Telix\Type\Message|bool
    {
        return $this->call(new RawMethod('editMessageCaption', [
            'business_connection_id'   => $businessConnectionId,
            'chat_id'                  => $chatId,
            'message_id'               => $messageId,
            'inline_message_id'        => $inlineMessageId,
            'caption'                  => $caption,
            'parse_mode'               => $parseMode,
            'caption_entities'         => $captionEntities,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'reply_markup'             => $replyMarkup,
        ], ResponseMap::of('editMessageCaption')));
    }
}
