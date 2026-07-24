<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQueryResult
{
    public function __construct(
        public string                $type,
        public string                $id,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public array                 $raw         = []
    )
    {
    }
}
