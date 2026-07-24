<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQueryResultArticle
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $title,
        public InputMessageContent   $inputMessageContent,
        public ?InlineKeyboardMarkup $replyMarkup         = null,
        public ?string               $url                 = null,
        public ?string               $description         = null,
        public ?string               $thumbnailUrl        = null,
        public ?int                  $thumbnailWidth      = null,
        public ?int                  $thumbnailHeight     = null,
        public array                 $raw                 = []
    )
    {
    }
}
