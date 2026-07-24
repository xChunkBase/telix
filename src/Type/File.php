<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class File
{
    public function __construct(
        public string  $fileId,
        public string  $fileUniqueId,
        public ?int    $fileSize     = null,
        public ?string $filePath     = null,
        public array   $raw          = []
    )
    {
    }
}
