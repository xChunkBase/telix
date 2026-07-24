<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StoryAreaTypeUniqueGift
{
    public function __construct(
        public string $type,
        public string $name,
        public array  $raw  = []
    )
    {
    }
}
