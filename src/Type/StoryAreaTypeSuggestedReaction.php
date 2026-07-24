<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StoryAreaTypeSuggestedReaction
{
    public function __construct(
        public string       $type,
        public ReactionType $reactionType,
        public ?bool        $isDark       = null,
        public ?bool        $isFlipped    = null,
        public array        $raw          = []
    )
    {
    }
}
