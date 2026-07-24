<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditMessageLiveLocation
{
    public function editMessageLiveLocation(
        float           $latitude,
        float           $longitude,
        ?string         $businessConnectionId = null,
        int|string|null $chatId               = null,
        ?int            $messageId            = null,
        ?string         $inlineMessageId      = null,
        ?int            $livePeriod           = null,
        ?float          $horizontalAccuracy   = null,
        ?int            $heading              = null,
        ?int            $proximityAlertRadius = null,
        mixed           $replyMarkup          = null
    ): \Telix\Type\Message|bool
    {
        return $this->call(new RawMethod('editMessageLiveLocation', [
            'latitude'               => $latitude,
            'longitude'              => $longitude,
            'business_connection_id' => $businessConnectionId,
            'chat_id'                => $chatId,
            'message_id'             => $messageId,
            'inline_message_id'      => $inlineMessageId,
            'live_period'            => $livePeriod,
            'horizontal_accuracy'    => $horizontalAccuracy,
            'heading'                => $heading,
            'proximity_alert_radius' => $proximityAlertRadius,
            'reply_markup'           => $replyMarkup,
        ], ResponseMap::of('editMessageLiveLocation')));
    }
}
