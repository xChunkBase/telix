<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Invoice
{
    public function __construct(
        public string $title,
        public string $description,
        public string $startParameter,
        public string $currency,
        public int    $totalAmount,
        public array  $raw            = []
    )
    {
    }
}
