<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BackgroundFillSolid
{
    public function __construct(
        public string $type,
        public int    $color,
        public array  $raw   = []
    )
    {
    }
}
