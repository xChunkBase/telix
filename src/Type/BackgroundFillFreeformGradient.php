<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BackgroundFillFreeformGradient
{
    public function __construct(
        public string $type,
        public array  $colors,
        public array  $raw    = []
    )
    {
    }
}
