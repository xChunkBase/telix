<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockAudio
{
    public function __construct(
        public string            $type,
        public Audio             $audio,
        public ?RichBlockCaption $caption = null,
        public array             $raw     = []
    )
    {
    }
}
