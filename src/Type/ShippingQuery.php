<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ShippingQuery
{
    public function __construct(
        public string          $id,
        public User            $from,
        public string          $invoicePayload,
        public ShippingAddress $shippingAddress,
        public array           $raw             = []
    )
    {
    }
}
