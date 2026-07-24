<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class TransactionPartnerAffiliateProgram
{
    public function __construct(
        public string $type,
        public int    $commissionPerMille,
        public ?User  $sponsorUser        = null,
        public array  $raw                = []
    )
    {
    }
}
