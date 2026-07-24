<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CopyMessage
{
    public function copyMessage(
        int|string                  $chatId,
        int|string                  $fromChatId,
        int                         $messageId,
        ?int                        $messageThreadId         = null,
        ?int                        $directMessagesTopicId   = null,
        ?int                        $videoStartTimestamp     = null,
        ?string                     $caption                 = null,
        ?\Telix\Type\Enum\ParseMode $parseMode               = null,
        ?array                      $captionEntities         = null,
        ?bool                       $showCaptionAboveMedia   = null,
        ?bool                       $disableNotification     = null,
        ?bool                       $protectContent          = null,
        ?bool                       $allowPaidBroadcast      = null,
        ?string                     $messageEffectId         = null,
        mixed                       $suggestedPostParameters = null,
        mixed                       $replyParameters         = null,
        mixed                       $replyMarkup             = null
    ): \Telix\Type\MessageId
    {
        return $this->call(new RawMethod('copyMessage', [
            'chat_id'                   => $chatId,
            'from_chat_id'              => $fromChatId,
            'message_id'                => $messageId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'video_start_timestamp'     => $videoStartTimestamp,
            'caption'                   => $caption,
            'parse_mode'                => $parseMode,
            'caption_entities'          => $captionEntities,
            'show_caption_above_media'  => $showCaptionAboveMedia,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'message_effect_id'         => $messageEffectId,
            'suggested_post_parameters' => $suggestedPostParameters,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('copyMessage')));
    }
}
