<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatPhoto
{
    public function __construct(
        public string $smallFileId,
        public string $smallFileUniqueId,
        public string $bigFileId,
        public string $bigFileUniqueId,
        public array  $raw               = []
    )
    {
    }
}
