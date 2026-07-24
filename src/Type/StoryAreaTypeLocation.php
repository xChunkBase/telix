<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StoryAreaTypeLocation
{
    public function __construct(
        public string           $type,
        public float            $latitude,
        public float            $longitude,
        public ?LocationAddress $address   = null,
        public array            $raw       = []
    )
    {
    }
}
