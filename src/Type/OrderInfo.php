<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class OrderInfo
{
    public function __construct(
        public ?string          $name            = null,
        public ?string          $phoneNumber     = null,
        public ?string          $email           = null,
        public ?ShippingAddress $shippingAddress = null,
        public array            $raw             = []
    )
    {
    }
}
