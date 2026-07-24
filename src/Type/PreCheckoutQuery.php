<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PreCheckoutQuery
{
    public function __construct(
        public string     $id,
        public User       $from,
        public string     $currency,
        public int        $totalAmount,
        public string     $invoicePayload,
        public ?string    $shippingOptionId = null,
        public ?OrderInfo $orderInfo        = null,
        public array      $raw              = []
    )
    {
    }
}
