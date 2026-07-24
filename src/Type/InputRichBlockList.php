<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputRichBlockList
{
    public function __construct(
        public string $type,
        #[ArrayOf(InputRichBlockListItem::class)]
        public array  $items,
        public array  $raw   = []
    )
    {
    }
}
