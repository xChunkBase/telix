<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ReactionTypeCustomEmoji
{
    public function __construct(
        public string $type,
        public string $customEmojiId,
        public array  $raw           = []
    )
    {
    }
}
