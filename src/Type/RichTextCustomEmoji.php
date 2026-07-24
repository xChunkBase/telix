<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextCustomEmoji
{
    public function __construct(
        public string $type,
        public string $customEmojiId,
        public string $alternativeText,
        public array  $raw             = []
    )
    {
    }
}
