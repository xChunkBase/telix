<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class StickerSet
{
    public function __construct(
        public string     $name,
        public string     $title,
        public string     $stickerType,
        #[ArrayOf(Sticker::class)]
        public array      $stickers,
        public ?PhotoSize $thumbnail   = null,
        public array      $raw         = []
    )
    {
    }
}
