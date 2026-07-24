<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BusinessLocation
{
    public function __construct(
        public string    $address,
        public ?Location $location = null,
        public array     $raw      = []
    )
    {
    }
}
