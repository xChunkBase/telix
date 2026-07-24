<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextHashtag
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $hashtag,
        public array    $raw     = []
    )
    {
    }
}
