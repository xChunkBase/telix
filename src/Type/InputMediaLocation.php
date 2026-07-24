<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputMediaLocation
{
    public function __construct(
        public string $type,
        public float  $latitude,
        public float  $longitude,
        public ?float $horizontalAccuracy = null,
        public array  $raw                = []
    )
    {
    }
}
