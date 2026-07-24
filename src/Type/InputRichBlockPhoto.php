<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichBlockPhoto
{
    public function __construct(
        public string            $type,
        public InputMediaPhoto   $photo,
        public ?RichBlockCaption $caption = null,
        public array             $raw     = []
    )
    {
    }
}
