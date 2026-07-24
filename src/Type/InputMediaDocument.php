<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputMediaDocument
{
    public function __construct(
        public string  $type,
        public string  $media,
        public ?string $thumbnail                   = null,
        public ?string $caption                     = null,
        public ?string $parseMode                   = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array  $captionEntities             = null,
        public ?bool   $disableContentTypeDetection = null,
        public array   $raw                         = []
    )
    {
    }
}
