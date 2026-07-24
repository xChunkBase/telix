<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockSectionHeading
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public int      $size,
        public array    $raw  = []
    )
    {
    }
}
