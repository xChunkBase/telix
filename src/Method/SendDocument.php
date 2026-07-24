<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendDocument
{
    public function sendDocument(
        int|string                        $chatId,
        \Telix\Type\InputFile|string      $document,
        ?string                           $businessConnectionId        = null,
        ?int                              $messageThreadId             = null,
        ?int                              $directMessagesTopicId       = null,
        ?int                              $receiverUserId              = null,
        ?string                           $callbackQueryId             = null,
        \Telix\Type\InputFile|string|null $thumbnail                   = null,
        ?string                           $caption                     = null,
        ?\Telix\Type\Enum\ParseMode       $parseMode                   = null,
        ?array                            $captionEntities             = null,
        ?bool                             $disableContentTypeDetection = null,
        ?bool                             $disableNotification         = null,
        ?bool                             $protectContent              = null,
        ?bool                             $allowPaidBroadcast          = null,
        ?string                           $messageEffectId             = null,
        mixed                             $suggestedPostParameters     = null,
        mixed                             $replyParameters             = null,
        mixed                             $replyMarkup                 = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendDocument', [
            'chat_id'                        => $chatId,
            'document'                       => $document,
            'business_connection_id'         => $businessConnectionId,
            'message_thread_id'              => $messageThreadId,
            'direct_messages_topic_id'       => $directMessagesTopicId,
            'receiver_user_id'               => $receiverUserId,
            'callback_query_id'              => $callbackQueryId,
            'thumbnail'                      => $thumbnail,
            'caption'                        => $caption,
            'parse_mode'                     => $parseMode,
            'caption_entities'               => $captionEntities,
            'disable_content_type_detection' => $disableContentTypeDetection,
            'disable_notification'           => $disableNotification,
            'protect_content'                => $protectContent,
            'allow_paid_broadcast'           => $allowPaidBroadcast,
            'message_effect_id'              => $messageEffectId,
            'suggested_post_parameters'      => $suggestedPostParameters,
            'reply_parameters'               => $replyParameters,
            'reply_markup'                   => $replyMarkup,
        ], ResponseMap::of('sendDocument')));
    }
}
