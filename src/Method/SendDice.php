<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendDice
{
    public function sendDice(
        int|string $chatId,
        ?string    $businessConnectionId    = null,
        ?int       $messageThreadId         = null,
        ?int       $directMessagesTopicId   = null,
        ?string    $emoji                   = null,
        ?bool      $disableNotification     = null,
        ?bool      $protectContent          = null,
        ?bool      $allowPaidBroadcast      = null,
        ?string    $messageEffectId         = null,
        mixed      $suggestedPostParameters = null,
        mixed      $replyParameters         = null,
        mixed      $replyMarkup             = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendDice', [
            'chat_id'                   => $chatId,
            'business_connection_id'    => $businessConnectionId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'emoji'                     => $emoji,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'message_effect_id'         => $messageEffectId,
            'suggested_post_parameters' => $suggestedPostParameters,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('sendDice')));
    }
}
