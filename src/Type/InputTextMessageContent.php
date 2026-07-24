<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputTextMessageContent
{
    public function __construct(
        public string              $messageText,
        public ?string             $parseMode          = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array              $entities           = null,
        public ?LinkPreviewOptions $linkPreviewOptions = null,
        public array               $raw                = []
    )
    {
    }
}
