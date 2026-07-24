<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextEmailAddress
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $emailAddress,
        public array    $raw          = []
    )
    {
    }
}
