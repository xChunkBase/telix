<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextAnchorLink
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $anchorName,
        public array    $raw        = []
    )
    {
    }
}
