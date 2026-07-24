<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InlineQueryResultPhoto
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $photoUrl,
        public string                $thumbnailUrl,
        public ?int                  $photoWidth            = null,
        public ?int                  $photoHeight           = null,
        public ?string               $title                 = null,
        public ?string               $description           = null,
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
