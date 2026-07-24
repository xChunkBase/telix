<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputRichBlockDetails
{
    public function __construct(
        public string   $type,
        public RichText $summary,
        #[ArrayOf(InputRichBlock::class)]
        public array    $blocks,
        public ?bool    $isOpen  = null,
        public array    $raw     = []
    )
    {
    }
}
