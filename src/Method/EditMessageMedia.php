<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditMessageMedia
{
    public function editMessageMedia(
        mixed           $media,
        ?string         $businessConnectionId = null,
        int|string|null $chatId               = null,
        ?int            $messageId            = null,
        ?string         $inlineMessageId      = null,
        mixed           $replyMarkup          = null
    ): \Telix\Type\Message|bool
    {
        return $this->call(new RawMethod('editMessageMedia', [
            'media'                  => $media,
            'business_connection_id' => $businessConnectionId,
            'chat_id'                => $chatId,
            'message_id'             => $messageId,
            'inline_message_id'      => $inlineMessageId,
            'reply_markup'           => $replyMarkup,
        ], ResponseMap::of('editMessageMedia')));
    }
}
