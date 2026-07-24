<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatLocation
{
    public function __construct(
        public Location $location,
        public string   $address,
        public array    $raw      = []
    )
    {
    }
}
