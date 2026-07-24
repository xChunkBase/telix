<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StoryArea
{
    public function __construct(
        public StoryAreaPosition $position,
        public StoryAreaType     $type,
        public array             $raw      = []
    )
    {
    }
}
