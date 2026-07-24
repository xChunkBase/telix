<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ForumTopicEdited
{
    public function __construct(
        public ?string $name              = null,
        public ?string $iconCustomEmojiId = null,
        public array   $raw               = []
    )
    {
    }
}
