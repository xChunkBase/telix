<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextPhoneNumber
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $phoneNumber,
        public array    $raw         = []
    )
    {
    }
}
