<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichBlockVideo
{
    public function __construct(
        public string            $type,
        public InputMediaVideo   $video,
        public ?RichBlockCaption $caption = null,
        public array             $raw     = []
    )
    {
    }
}
