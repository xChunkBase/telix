<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputPaidMediaVideo
{
    public function __construct(
        public string  $type,
        public string  $media,
        public ?string $thumbnail         = null,
        public ?string $cover             = null,
        public ?int    $startTimestamp    = null,
        public ?int    $width             = null,
        public ?int    $height            = null,
        public ?int    $duration          = null,
        public ?bool   $supportsStreaming = null,
        public array   $raw               = []
    )
    {
    }
}
