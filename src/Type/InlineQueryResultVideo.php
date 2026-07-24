<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InlineQueryResultVideo
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $videoUrl,
        public string                $mimeType,
        public string                $thumbnailUrl,
        public string                $title,
        public ?string               $caption               = null,
        public ?string               $parseMode             = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array                $captionEntities       = null,
        public ?bool                 $showCaptionAboveMedia = null,
        public ?int                  $videoWidth            = null,
        public ?int                  $videoHeight           = null,
        public ?int                  $videoDuration         = null,
        public ?string               $description           = null,
        public ?InlineKeyboardMarkup $replyMarkup           = null,
        public ?InputMessageContent  $inputMessageContent   = null,
        public array                 $raw                   = []
    )
    {
    }
}
