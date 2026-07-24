<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputMediaSticker
{
    public function __construct(
        public string  $type,
        public string  $media,
        public ?string $emoji = null,
        public array   $raw   = []
    )
    {
    }
}
