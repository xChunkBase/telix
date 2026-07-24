<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ForwardMessage
{
    public function forwardMessage(
        int|string $chatId,
        int|string $fromChatId,
        int        $messageId,
        ?int       $messageThreadId         = null,
        ?int       $directMessagesTopicId   = null,
        ?int       $videoStartTimestamp     = null,
        ?bool      $disableNotification     = null,
        ?bool      $protectContent          = null,
        ?string    $messageEffectId         = null,
        mixed      $suggestedPostParameters = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('forwardMessage', [
            'chat_id'                   => $chatId,
            'from_chat_id'              => $fromChatId,
            'message_id'                => $messageId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'video_start_timestamp'     => $videoStartTimestamp,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'message_effect_id'         => $messageEffectId,
            'suggested_post_parameters' => $suggestedPostParameters,
        ], ResponseMap::of('forwardMessage')));
    }
}
