<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputMediaVenue
{
    public function __construct(
        public string  $type,
        public float   $latitude,
        public float   $longitude,
        public string  $title,
        public string  $address,
        public ?string $foursquareId    = null,
        public ?string $foursquareType  = null,
        public ?string $googlePlaceId   = null,
        public ?string $googlePlaceType = null,
        public array   $raw             = []
    )
    {
    }
}
