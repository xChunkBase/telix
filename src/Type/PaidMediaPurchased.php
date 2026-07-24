<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PaidMediaPurchased
{
    public function __construct(
        public User   $from,
        public string $paidMediaPayload,
        public array  $raw              = []
    )
    {
    }
}
