<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class Gifts
{
    public function __construct(
        #[ArrayOf(Gift::class)]
        public array $gifts,
        public array $raw   = []
    )
    {
    }
}
