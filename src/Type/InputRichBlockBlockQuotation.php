<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputRichBlockBlockQuotation
{
    public function __construct(
        public string    $type,
        #[ArrayOf(InputRichBlock::class)]
        public array     $blocks,
        public ?RichText $credit = null,
        public array     $raw    = []
    )
    {
    }
}
