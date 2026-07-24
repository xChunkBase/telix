<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InlineQueryResultDocument
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $title,
        public string                $documentUrl,
        public string                $mimeType,
        public ?string               $caption             = null,
        public ?string               $parseMode           = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array                $captionEntities     = null,
        public ?string               $description         = null,
        public ?InlineKeyboardMarkup $replyMarkup         = null,
        public ?InputMessageContent  $inputMessageContent = null,
        public ?string               $thumbnailUrl        = null,
        public ?int                  $thumbnailWidth      = null,
        public ?int                  $thumbnailHeight     = null,
        public array                 $raw                 = []
    )
    {
    }
}
