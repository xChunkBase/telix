<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextReferenceLink
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $referenceName,
        public array    $raw           = []
    )
    {
    }
}
