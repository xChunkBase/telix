<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class TransactionPartnerUser
{
    public function __construct(
        public string         $type,
        public string         $transactionType,
        public User           $user,
        public ?AffiliateInfo $affiliate                   = null,
        public ?string        $invoicePayload              = null,
        public ?int           $subscriptionPeriod          = null,
        #[ArrayOf(PaidMedia::class)]
        public ?array         $paidMedia                   = null,
        public ?string        $paidMediaPayload            = null,
        public ?Gift          $gift                        = null,
        public ?int           $premiumSubscriptionDuration = null,
        public array          $raw                         = []
    )
    {
    }
}
