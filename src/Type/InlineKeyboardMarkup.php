<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineKeyboardMarkup
{
    public function __construct(
        public array $inlineKeyboard,
        public array $raw            = []
    )
    {
    }
}
