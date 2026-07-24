<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQueryResultCachedSticker
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $stickerFileId,
        public ?InlineKeyboardMarkup $replyMarkup         = null,
        public ?InputMessageContent  $inputMessageContent = null,
        public array                 $raw                 = []
    )
    {
    }
}
