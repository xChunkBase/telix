<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuggestedPostPrice
{
    public function __construct(
        public string $currency,
        public int    $amount,
        public array  $raw      = []
    )
    {
    }
}
