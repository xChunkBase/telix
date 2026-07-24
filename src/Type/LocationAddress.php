<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class LocationAddress
{
    public function __construct(
        public string  $countryCode,
        public ?string $state       = null,
        public ?string $city        = null,
        public ?string $street      = null,
        public array   $raw         = []
    )
    {
    }
}
