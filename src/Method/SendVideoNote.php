<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendVideoNote
{
    public function sendVideoNote(
        int|string                        $chatId,
        \Telix\Type\InputFile|string      $videoNote,
        ?string                           $businessConnectionId    = null,
        ?int                              $messageThreadId         = null,
        ?int                              $directMessagesTopicId   = null,
        ?int                              $receiverUserId          = null,
        ?string                           $callbackQueryId         = null,
        ?int                              $duration                = null,
        ?int                              $length                  = null,
        \Telix\Type\InputFile|string|null $thumbnail               = null,
        ?bool                             $disableNotification     = null,
        ?bool                             $protectContent          = null,
        ?bool                             $allowPaidBroadcast      = null,
        ?string                           $messageEffectId         = null,
        mixed                             $suggestedPostParameters = null,
        mixed                             $replyParameters         = null,
        mixed                             $replyMarkup             = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendVideoNote', [
            'chat_id'                   => $chatId,
            'video_note'                => $videoNote,
            'business_connection_id'    => $businessConnectionId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'receiver_user_id'          => $receiverUserId,
            'callback_query_id'         => $callbackQueryId,
            'duration'                  => $duration,
            'length'                    => $length,
            'thumbnail'                 => $thumbnail,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'message_effect_id'         => $messageEffectId,
            'suggested_post_parameters' => $suggestedPostParameters,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('sendVideoNote')));
    }
}
