<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Voice
{
    public function __construct(
        public string  $fileId,
        public string  $fileUniqueId,
        public int     $duration,
        public ?string $mimeType     = null,
        public ?int    $fileSize     = null
    )
    {
    }
}
