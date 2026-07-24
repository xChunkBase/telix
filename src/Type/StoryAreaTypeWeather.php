<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StoryAreaTypeWeather
{
    public function __construct(
        public string $type,
        public float  $temperature,
        public string $emoji,
        public int    $backgroundColor,
        public array  $raw             = []
    )
    {
    }
}
