<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ForumTopic
{
    public function __construct(
        public int     $messageThreadId,
        public string  $name,
        public int     $iconColor,
        public ?string $iconCustomEmojiId = null,
        public ?bool   $isNameImplicit    = null,
        public array   $raw               = []
    )
    {
    }
}
