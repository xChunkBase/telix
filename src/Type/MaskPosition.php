<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MaskPosition
{
    public function __construct(
        public string $point,
        public float  $xShift,
        public float  $yShift,
        public float  $scale,
        public array  $raw    = []
    )
    {
    }
}
