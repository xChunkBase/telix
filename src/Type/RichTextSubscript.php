<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextSubscript
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public array    $raw  = []
    )
    {
    }
}
