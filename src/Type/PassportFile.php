<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PassportFile
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int    $fileSize,
        public int    $fileDate,
        public array  $raw          = []
    )
    {
    }
}
