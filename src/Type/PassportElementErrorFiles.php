<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PassportElementErrorFiles
{
    public function __construct(
        public string $source,
        public string $type,
        public array  $fileHashes,
        public string $message,
        public array  $raw        = []
    )
    {
    }
}
