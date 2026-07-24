<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendAudio
{
    public function sendAudio(
        int|string                        $chatId,
        \Telix\Type\InputFile|string      $audio,
        ?string                           $businessConnectionId    = null,
        ?int                              $messageThreadId         = null,
        ?int                              $directMessagesTopicId   = null,
        ?int                              $receiverUserId          = null,
        ?string                           $callbackQueryId         = null,
        ?string                           $caption                 = null,
        ?\Telix\Type\Enum\ParseMode       $parseMode               = null,
        ?array                            $captionEntities         = null,
        ?int                              $duration                = null,
        ?string                           $performer               = null,
        ?string                           $title                   = null,
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
        return $this->call(new RawMethod('sendAudio', [
            'chat_id'                   => $chatId,
            'audio'                     => $audio,
            'business_connection_id'    => $businessConnectionId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'receiver_user_id'          => $receiverUserId,
            'callback_query_id'         => $callbackQueryId,
            'caption'                   => $caption,
            'parse_mode'                => $parseMode,
            'caption_entities'          => $captionEntities,
            'duration'                  => $duration,
            'performer'                 => $performer,
            'title'                     => $title,
            'thumbnail'                 => $thumbnail,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'message_effect_id'         => $messageEffectId,
            'suggested_post_parameters' => $suggestedPostParameters,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('sendAudio')));
    }
}
