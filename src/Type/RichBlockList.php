<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class RichBlockList
{
    public function __construct(
        public string $type,
        #[ArrayOf(RichBlockListItem::class)]
        public array  $items,
        public array  $raw   = []
    )
    {
    }
}
