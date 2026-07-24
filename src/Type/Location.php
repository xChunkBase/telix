<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Location
{
    public function __construct(
        public float  $latitude,
        public float  $longitude,
        public ?float $horizontalAccuracy   = null,
        public ?int   $livePeriod           = null,
        public ?int   $heading              = null,
        public ?int   $proximityAlertRadius = null,
        public array  $raw                  = []
    )
    {
    }
}
