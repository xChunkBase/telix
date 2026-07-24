<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Type\Message;
use Telix\Type\Enum\ParseMode;

trait SendMessage
{
    public function sendMessage(
        int|string $chatId,
        string     $text,
        ?ParseMode $parseMode           = null,
        mixed      $replyMarkup         = null,
        ?int       $replyToMessageId    = null,
        ?bool      $disableNotification = null
    ): Message
    {
        return $this->call(new RawMethod('sendMessage', [
            'chat_id'              => $chatId,
            'text'                 => $text,
            'parse_mode'           => $parseMode,
            'reply_markup'         => $replyMarkup,
            'reply_parameters'     => $replyToMessageId !== null ? ['message_id' => $replyToMessageId] : null,
            'disable_notification' => $disableNotification,
        ], Message::class));
    }
}
