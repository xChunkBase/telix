<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PassportElementErrorSelfie
{
    public function __construct(
        public string $source,
        public string $type,
        public string $fileHash,
        public string $message,
        public array  $raw      = []
    )
    {
    }
}
