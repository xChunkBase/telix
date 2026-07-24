<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class RichBlockListItem
{
    public function __construct(
        public string  $label,
        #[ArrayOf(RichBlock::class)]
        public array   $blocks,
        public ?bool   $hasCheckbox = null,
        public ?bool   $isChecked   = null,
        public ?int    $value       = null,
        public ?string $type        = null,
        public array   $raw         = []
    )
    {
    }
}
