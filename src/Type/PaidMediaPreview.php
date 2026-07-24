<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PaidMediaPreview
{
    public function __construct(
        public string $type,
        public ?int   $width    = null,
        public ?int   $height   = null,
        public ?int   $duration = null,
        public array  $raw      = []
    )
    {
    }
}
