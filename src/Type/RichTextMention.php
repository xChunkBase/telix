<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextMention
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $username,
        public array    $raw      = []
    )
    {
    }
}
