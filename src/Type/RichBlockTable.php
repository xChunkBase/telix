<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockTable
{
    public function __construct(
        public string    $type,
        public array     $cells,
        public ?bool     $isBordered = null,
        public ?bool     $isStriped  = null,
        public ?RichText $caption    = null,
        public array     $raw        = []
    )
    {
    }
}
