<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichBlockAudio
{
    public function __construct(
        public string            $type,
        public InputMediaAudio   $audio,
        public ?RichBlockCaption $caption = null,
        public array             $raw     = []
    )
    {
    }
}
