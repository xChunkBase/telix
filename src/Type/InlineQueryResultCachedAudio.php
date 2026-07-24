<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InlineQueryResultCachedAudio
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $audioFileId,
        public ?string               $caption             = null,
        public ?string               $parseMode           = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array                $captionEntities     = null,
        public ?InlineKeyboardMarkup $replyMarkup         = null,
        public ?InputMessageContent  $inputMessageContent = null,
        public array                 $raw                 = []
    )
    {
    }
}
