<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class LabeledPrice
{
    public function __construct(
        public string $label,
        public int    $amount,
        public array  $raw    = []
    )
    {
    }
}
