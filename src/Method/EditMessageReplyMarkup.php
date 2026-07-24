<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Type\Message;

trait EditMessageReplyMarkup
{
    public function editMessageReplyMarkup(
        int|string $chatId,
        int        $messageId,
        mixed      $replyMarkup = null
    ): Message|bool
    {
        return $this->call(new RawMethod('editMessageReplyMarkup', [
            'chat_id'      => $chatId,
            'message_id'   => $messageId,
            'reply_markup' => $replyMarkup,
        ], Message::class));
    }
}
