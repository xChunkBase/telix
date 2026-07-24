<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class LivePhoto
{
    public function __construct(
        public string  $fileId,
        public string  $fileUniqueId,
        public int     $width,
        public int     $height,
        public int     $duration,
        #[ArrayOf(PhotoSize::class)]
        public ?array  $photo        = null,
        public ?string $mimeType     = null,
        public ?int    $fileSize     = null,
        public array   $raw          = []
    )
    {
    }
}
