<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQueryResultVenue
{
    public function __construct(
        public string                $type,
        public string                $id,
        public float                 $latitude,
        public float                 $longitude,
        public string                $title,
        public string                $address,
        public ?string               $foursquareId        = null,
        public ?string               $foursquareType      = null,
        public ?string               $googlePlaceId       = null,
        public ?string               $googlePlaceType     = null,
        public ?InlineKeyboardMarkup $replyMarkup         = null,
        public ?InputMessageContent  $inputMessageContent = null,
        public ?string               $thumbnailUrl        = null,
        public ?int                  $thumbnailWidth      = null,
        public ?int                  $thumbnailHeight     = null,
        public array                 $raw                 = []
    )
    {
    }
}
