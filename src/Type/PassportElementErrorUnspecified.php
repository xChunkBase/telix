<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PassportElementErrorUnspecified
{
    public function __construct(
        public string $source,
        public string $type,
        public string $elementHash,
        public string $message,
        public array  $raw         = []
    )
    {
    }
}
