<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class OwnedGifts
{
    public function __construct(
        public int     $totalCount,
        #[ArrayOf(OwnedGift::class)]
        public array   $gifts,
        public ?string $nextOffset = null,
        public array   $raw        = []
    )
    {
    }
}
