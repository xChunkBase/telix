<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputPollOption
{
    public function __construct(
        public string                $text,
        public ?string               $textParseMode = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array                $textEntities  = null,
        public ?InputPollOptionMedia $media         = null,
        public array                 $raw           = []
    )
    {
    }
}
