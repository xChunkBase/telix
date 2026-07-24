<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendLocation
{
    public function sendLocation(
        int|string $chatId,
        float      $latitude,
        float      $longitude,
        ?string    $businessConnectionId    = null,
        ?int       $messageThreadId         = null,
        ?int       $directMessagesTopicId   = null,
        ?int       $receiverUserId          = null,
        ?string    $callbackQueryId         = null,
        ?float     $horizontalAccuracy      = null,
        ?int       $livePeriod              = null,
        ?int       $heading                 = null,
        ?int       $proximityAlertRadius    = null,
        ?bool      $disableNotification     = null,
        ?bool      $protectContent          = null,
        ?bool      $allowPaidBroadcast      = null,
        ?string    $messageEffectId         = null,
        mixed      $suggestedPostParameters = null,
        mixed      $replyParameters         = null,
        mixed      $replyMarkup             = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendLocation', [
            'chat_id'                   => $chatId,
            'latitude'                  => $latitude,
            'longitude'                 => $longitude,
            'business_connection_id'    => $businessConnectionId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'receiver_user_id'          => $receiverUserId,
            'callback_query_id'         => $callbackQueryId,
            'horizontal_accuracy'       => $horizontalAccuracy,
            'live_period'               => $livePeriod,
            'heading'                   => $heading,
            'proximity_alert_radius'    => $proximityAlertRadius,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'message_effect_id'         => $messageEffectId,
            'suggested_post_parameters' => $suggestedPostParameters,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('sendLocation')));
    }
}
