<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Type\Message;
use Telix\Type\Enum\ParseMode;

trait EditMessageText
{
    public function editMessageText(
        int|string $chatId,
        int        $messageId,
        string     $text,
        ?ParseMode $parseMode   = null,
        mixed      $replyMarkup = null
    ): Message|bool
    {
        return $this->call(new RawMethod('editMessageText', [
            'chat_id'      => $chatId,
            'message_id'   => $messageId,
            'text'         => $text,
            'parse_mode'   => $parseMode,
            'reply_markup' => $replyMarkup,
        ], Message::class));
    }
}
