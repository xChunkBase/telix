<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InlineQueryResultGif
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $gifUrl,
        public string                $thumbnailUrl,
        public ?int                  $gifWidth              = null,
        public ?int                  $gifHeight             = null,
        public ?int                  $gifDuration           = null,
        public ?string               $thumbnailMimeType     = null,
        public ?string               $title                 = null,
        public ?string               $caption               = null,
        public ?string               $parseMode             = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array                $captionEntities       = null,
        public ?bool                 $showCaptionAboveMedia = null,
        public ?InlineKeyboardMarkup $replyMarkup           = null,
        public ?InputMessageContent  $inputMessageContent   = null,
        public array                 $raw                   = []
    )
    {
    }
}
