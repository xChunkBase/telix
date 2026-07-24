<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendGame
{
    public function sendGame(
        int|string $chatId,
        string     $gameShortName,
        ?string    $businessConnectionId = null,
        ?int       $messageThreadId      = null,
        ?bool      $disableNotification  = null,
        ?bool      $protectContent       = null,
        ?bool      $allowPaidBroadcast   = null,
        ?string    $messageEffectId      = null,
        mixed      $replyParameters      = null,
        mixed      $replyMarkup          = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendGame', [
            'chat_id'                => $chatId,
            'game_short_name'        => $gameShortName,
            'business_connection_id' => $businessConnectionId,
            'message_thread_id'      => $messageThreadId,
            'disable_notification'   => $disableNotification,
            'protect_content'        => $protectContent,
            'allow_paid_broadcast'   => $allowPaidBroadcast,
            'message_effect_id'      => $messageEffectId,
            'reply_parameters'       => $replyParameters,
            'reply_markup'           => $replyMarkup,
        ], ResponseMap::of('sendGame')));
    }
}
