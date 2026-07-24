<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BackgroundFillGradient
{
    public function __construct(
        public string $type,
        public int    $topColor,
        public int    $bottomColor,
        public int    $rotationAngle,
        public array  $raw           = []
    )
    {
    }
}
