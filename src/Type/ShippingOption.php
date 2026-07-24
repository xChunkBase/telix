<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class ShippingOption
{
    public function __construct(
        public string $id,
        public string $title,
        #[ArrayOf(LabeledPrice::class)]
        public array  $prices,
        public array  $raw    = []
    )
    {
    }
}
