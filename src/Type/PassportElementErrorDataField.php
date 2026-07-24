<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PassportElementErrorDataField
{
    public function __construct(
        public string $source,
        public string $type,
        public string $fieldName,
        public string $dataHash,
        public string $message,
        public array  $raw       = []
    )
    {
    }
}
