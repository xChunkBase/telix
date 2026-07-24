<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputMediaVoiceNote
{
    public function __construct(
        public string  $type,
        public string  $media,
        public ?string $caption         = null,
        public ?string $parseMode       = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array  $captionEntities = null,
        public ?int    $duration        = null,
        public array   $raw             = []
    )
    {
    }
}
