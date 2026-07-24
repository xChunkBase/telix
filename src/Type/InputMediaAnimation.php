<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputMediaAnimation
{
    public function __construct(
        public string  $type,
        public string  $media,
        public ?string $thumbnail             = null,
        public ?string $caption               = null,
        public ?string $parseMode             = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array  $captionEntities       = null,
        public ?bool   $showCaptionAboveMedia = null,
        public ?int    $width                 = null,
        public ?int    $height                = null,
        public ?int    $duration              = null,
        public ?bool   $hasSpoiler            = null,
        public array   $raw                   = []
    )
    {
    }
}
