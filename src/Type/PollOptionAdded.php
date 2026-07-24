<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class PollOptionAdded
{
    public function __construct(
        public string                    $optionPersistentId,
        public string                    $optionText,
        public ?MaybeInaccessibleMessage $pollMessage        = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array                    $optionTextEntities = null,
        public array                     $raw                = []
    )
    {
    }
}
