<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextReference
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $name,
        public array    $raw  = []
    )
    {
    }
}
