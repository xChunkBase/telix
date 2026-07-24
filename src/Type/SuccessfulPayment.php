<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuccessfulPayment
{
    public function __construct(
        public string     $currency,
        public int        $totalAmount,
        public string     $invoicePayload,
        public string     $telegramPaymentChargeId,
        public string     $providerPaymentChargeId,
        public ?int       $subscriptionExpirationDate = null,
        public ?bool      $isRecurring                = null,
        public ?bool      $isFirstRecurring           = null,
        public ?string    $shippingOptionId           = null,
        public ?OrderInfo $orderInfo                  = null,
        public array      $raw                        = []
    )
    {
    }
}
