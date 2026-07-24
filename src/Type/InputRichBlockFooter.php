<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichBlockFooter
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public array    $raw  = []
    )
    {
    }
}
