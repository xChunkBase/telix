<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendPaidMedia
{
    public function sendPaidMedia(
        int|string                  $chatId,
        int                         $starCount,
        array                       $media,
        ?string                     $businessConnectionId    = null,
        ?int                        $messageThreadId         = null,
        ?int                        $directMessagesTopicId   = null,
        ?string                     $payload                 = null,
        ?string                     $caption                 = null,
        ?\Telix\Type\Enum\ParseMode $parseMode               = null,
        ?array                      $captionEntities         = null,
        ?bool                       $showCaptionAboveMedia   = null,
        ?bool                       $disableNotification     = null,
        ?bool                       $protectContent          = null,
        ?bool                       $allowPaidBroadcast      = null,
        mixed                       $suggestedPostParameters = null,
        mixed                       $replyParameters         = null,
        mixed                       $replyMarkup             = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendPaidMedia', [
            'chat_id'                   => $chatId,
            'star_count'                => $starCount,
            'media'                     => $media,
            'business_connection_id'    => $businessConnectionId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'payload'                   => $payload,
            'caption'                   => $caption,
            'parse_mode'                => $parseMode,
            'caption_entities'          => $captionEntities,
            'show_caption_above_media'  => $showCaptionAboveMedia,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'suggested_post_parameters' => $suggestedPostParameters,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('sendPaidMedia')));
    }
}
