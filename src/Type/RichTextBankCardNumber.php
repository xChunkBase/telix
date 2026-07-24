<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextBankCardNumber
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $bankCardNumber,
        public array    $raw            = []
    )
    {
    }
}
