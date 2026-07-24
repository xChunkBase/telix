<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichBlockPullQuotation
{
    public function __construct(
        public string    $type,
        public RichText  $text,
        public ?RichText $credit = null,
        public array     $raw    = []
    )
    {
    }
}
