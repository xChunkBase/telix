<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PhotoSize
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int    $width,
        public int    $height,
        public ?int   $fileSize     = null,
        public array  $raw          = []
    )
    {
    }
}
