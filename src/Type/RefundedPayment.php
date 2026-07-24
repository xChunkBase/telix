<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RefundedPayment
{
    public function __construct(
        public string  $currency,
        public int     $totalAmount,
        public string  $invoicePayload,
        public string  $telegramPaymentChargeId,
        public ?string $providerPaymentChargeId = null,
        public array   $raw                     = []
    )
    {
    }
}
