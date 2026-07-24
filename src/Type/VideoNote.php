<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class VideoNote
{
    public function __construct(
        public string     $fileId,
        public string     $fileUniqueId,
        public int        $length,
        public int        $duration,
        public ?PhotoSize $thumbnail    = null,
        public ?int       $fileSize     = null,
        public array      $raw          = []
    )
    {
    }
}
