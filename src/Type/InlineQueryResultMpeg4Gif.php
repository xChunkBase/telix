<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InlineQueryResultMpeg4Gif
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $mpeg4Url,
        public string                $thumbnailUrl,
        public ?int                  $mpeg4Width            = null,
        public ?int                  $mpeg4Height           = null,
        public ?int                  $mpeg4Duration         = null,
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
