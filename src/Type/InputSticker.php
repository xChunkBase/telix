<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputSticker
{
    public function __construct(
        public string        $sticker,
        public string        $format,
        public array         $emojiList,
        public ?MaskPosition $maskPosition = null,
        public ?array        $keywords     = null,
        public array         $raw          = []
    )
    {
    }
}
