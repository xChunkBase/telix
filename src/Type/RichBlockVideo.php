<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockVideo
{
    public function __construct(
        public string            $type,
        public Video             $video,
        public ?bool             $hasSpoiler = null,
        public ?RichBlockCaption $caption    = null,
        public array             $raw        = []
    )
    {
    }
}
