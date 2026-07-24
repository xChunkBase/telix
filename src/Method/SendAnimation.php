<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendAnimation
{
    public function sendAnimation(
        int|string                        $chatId,
        \Telix\Type\InputFile|string      $animation,
        ?string                           $businessConnectionId    = null,
        ?int                              $messageThreadId         = null,
        ?int                              $directMessagesTopicId   = null,
        ?int                              $receiverUserId          = null,
        ?string                           $callbackQueryId         = null,
        ?int                              $duration                = null,
        ?int                              $width                   = null,
        ?int                              $height                  = null,
        \Telix\Type\InputFile|string|null $thumbnail               = null,
        ?string                           $caption                 = null,
        ?\Telix\Type\Enum\ParseMode       $parseMode               = null,
        ?array                            $captionEntities         = null,
        ?bool                             $showCaptionAboveMedia   = null,
        ?bool                             $hasSpoiler              = null,
        ?bool                             $disableNotification     = null,
        ?bool                             $protectContent          = null,
        ?bool                             $allowPaidBroadcast      = null,
        ?string                           $messageEffectId         = null,
        mixed                             $suggestedPostParameters = null,
        mixed                             $replyParameters         = null,
        mixed                             $replyMarkup             = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendAnimation', [
            'chat_id'                   => $chatId,
            'animation'                 => $animation,
            'business_connection_id'    => $businessConnectionId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'receiver_user_id'          => $receiverUserId,
            'callback_query_id'         => $callbackQueryId,
            'duration'                  => $duration,
            'width'                     => $width,
            'height'                    => $height,
            'thumbnail'                 => $thumbnail,
            'caption'                   => $caption,
            'parse_mode'                => $parseMode,
            'caption_entities'          => $captionEntities,
            'show_caption_above_media'  => $showCaptionAboveMedia,
            'has_spoiler'               => $hasSpoiler,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'message_effect_id'         => $messageEffectId,
            'suggested_post_parameters' => $suggestedPostParameters,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('sendAnimation')));
    }
}
