<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendVenue
{
    public function sendVenue(
        int|string $chatId,
        float      $latitude,
        float      $longitude,
        string     $title,
        string     $address,
        ?string    $businessConnectionId    = null,
        ?int       $messageThreadId         = null,
        ?int       $directMessagesTopicId   = null,
        ?int       $receiverUserId          = null,
        ?string    $callbackQueryId         = null,
        ?string    $foursquareId            = null,
        ?string    $foursquareType          = null,
        ?string    $googlePlaceId           = null,
        ?string    $googlePlaceType         = null,
        ?bool      $disableNotification     = null,
        ?bool      $protectContent          = null,
        ?bool      $allowPaidBroadcast      = null,
        ?string    $messageEffectId         = null,
        mixed      $suggestedPostParameters = null,
        mixed      $replyParameters         = null,
        mixed      $replyMarkup             = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendVenue', [
            'chat_id'                   => $chatId,
            'latitude'                  => $latitude,
            'longitude'                 => $longitude,
            'title'                     => $title,
            'address'                   => $address,
            'business_connection_id'    => $businessConnectionId,
            'message_thread_id'         => $messageThreadId,
            'direct_messages_topic_id'  => $directMessagesTopicId,
            'receiver_user_id'          => $receiverUserId,
            'callback_query_id'         => $callbackQueryId,
            'foursquare_id'             => $foursquareId,
            'foursquare_type'           => $foursquareType,
            'google_place_id'           => $googlePlaceId,
            'google_place_type'         => $googlePlaceType,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'message_effect_id'         => $messageEffectId,
            'suggested_post_parameters' => $suggestedPostParameters,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('sendVenue')));
    }
}
