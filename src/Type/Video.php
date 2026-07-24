<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class Video
{
    public function __construct(
        public string     $fileId,
        public string     $fileUniqueId,
        public int        $width,
        public int        $height,
        public int        $duration,
        public ?PhotoSize $thumbnail      = null,
        #[ArrayOf(PhotoSize::class)]
        public ?array     $cover          = null,
        public ?int       $startTimestamp = null,
        #[ArrayOf(VideoQuality::class)]
        public ?array     $qualities      = null,
        public ?string    $fileName       = null,
        public ?string    $mimeType       = null,
        public ?int       $fileSize       = null,
        public array      $raw            = []
    )
    {
    }
}
