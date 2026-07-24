<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class RichBlockBlockQuotation
{
    public function __construct(
        public string    $type,
        #[ArrayOf(RichBlock::class)]
        public array     $blocks,
        public ?RichText $credit = null,
        public array     $raw    = []
    )
    {
    }
}
