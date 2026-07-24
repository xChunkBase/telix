<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class PaidMediaInfo
{
    public function __construct(
        public int   $starCount,
        #[ArrayOf(PaidMedia::class)]
        public array $paidMedia,
        public array $raw       = []
    )
    {
    }
}
