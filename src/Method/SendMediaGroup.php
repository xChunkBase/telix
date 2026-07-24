<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendMediaGroup
{
    public function sendMediaGroup(
        int|string $chatId,
        mixed      $media,
        ?string    $businessConnectionId  = null,
        ?int       $messageThreadId       = null,
        ?int       $directMessagesTopicId = null,
        ?bool      $disableNotification   = null,
        ?bool      $protectContent        = null,
        ?bool      $allowPaidBroadcast    = null,
        ?string    $messageEffectId       = null,
        mixed      $replyParameters       = null
    ): array
    {
        return $this->call(new RawMethod('sendMediaGroup', [
            'chat_id'                  => $chatId,
            'media'                    => $media,
            'business_connection_id'   => $businessConnectionId,
            'message_thread_id'        => $messageThreadId,
            'direct_messages_topic_id' => $directMessagesTopicId,
            'disable_notification'     => $disableNotification,
            'protect_content'          => $protectContent,
            'allow_paid_broadcast'     => $allowPaidBroadcast,
            'message_effect_id'        => $messageEffectId,
            'reply_parameters'         => $replyParameters,
        ], ResponseMap::of('sendMediaGroup')));
    }
}
