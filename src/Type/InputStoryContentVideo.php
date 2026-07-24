<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputStoryContentVideo
{
    public function __construct(
        public string $type,
        public string $video,
        public ?float $duration            = null,
        public ?float $coverFrameTimestamp = null,
        public ?bool  $isAnimation         = null,
        public array  $raw                 = []
    )
    {
    }
}
