<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQueryResultGame
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $gameShortName,
        public ?InlineKeyboardMarkup $replyMarkup   = null,
        public array                 $raw           = []
    )
    {
    }
}
