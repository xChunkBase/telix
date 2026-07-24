<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PaidMessagePriceChanged
{
    public function __construct(
        public int   $paidMessageStarCount,
        public array $raw                  = []
    )
    {
    }
}
