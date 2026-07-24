<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class TransactionPartnerFragment
{
    public function __construct(
        public string                  $type,
        public ?RevenueWithdrawalState $withdrawalState = null,
        public array                   $raw             = []
    )
    {
    }
}
