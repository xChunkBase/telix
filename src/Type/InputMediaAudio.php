<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputMediaAudio
{
    public function __construct(
        public string  $type,
        public string  $media,
        public ?string $thumbnail       = null,
        public ?string $caption         = null,
        public ?string $parseMode       = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array  $captionEntities = null,
        public ?int    $duration        = null,
        public ?string $performer       = null,
        public ?string $title           = null,
        public array   $raw             = []
    )
    {
    }
}
