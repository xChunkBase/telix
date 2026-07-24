<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class UniqueGiftColors
{
    public function __construct(
        public string $modelCustomEmojiId,
        public string $symbolCustomEmojiId,
        public int    $lightThemeMainColor,
        public array  $lightThemeOtherColors,
        public int    $darkThemeMainColor,
        public array  $darkThemeOtherColors,
        public array  $raw                   = []
    )
    {
    }
}
