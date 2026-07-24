<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextCashtag
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $cashtag,
        public array    $raw     = []
    )
    {
    }
}
