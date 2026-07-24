<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockTableCell
{
    public function __construct(
        public string    $align,
        public string    $valign,
        public ?RichText $text     = null,
        public ?bool     $isHeader = null,
        public ?int      $colspan  = null,
        public ?int      $rowspan  = null,
        public array     $raw      = []
    )
    {
    }
}
