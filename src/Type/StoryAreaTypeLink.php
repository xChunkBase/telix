<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StoryAreaTypeLink
{
    public function __construct(
        public string $type,
        public string $url,
        public array  $raw  = []
    )
    {
    }
}
