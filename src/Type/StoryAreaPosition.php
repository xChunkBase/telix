<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StoryAreaPosition
{
    public function __construct(
        public float $xPercentage,
        public float $yPercentage,
        public float $widthPercentage,
        public float $heightPercentage,
        public float $rotationAngle,
        public float $cornerRadiusPercentage,
        public array $raw                    = []
    )
    {
    }
}
