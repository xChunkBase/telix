<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RevenueWithdrawalStateSucceeded
{
    public function __construct(
        public string $type,
        public int    $date,
        public string $url,
        public array  $raw  = []
    )
    {
    }
}
