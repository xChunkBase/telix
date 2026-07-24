<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQueryResultContact
{
    public function __construct(
        public string                $type,
        public string                $id,
        public string                $phoneNumber,
        public string                $firstName,
        public ?string               $lastName            = null,
        public ?string               $vcard               = null,
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
