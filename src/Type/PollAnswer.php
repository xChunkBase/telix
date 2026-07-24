<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PollAnswer
{
    public function __construct(
        public string $pollId,
        public array  $optionIds,
        public array  $optionPersistentIds,
        public ?Chat  $voterChat           = null,
        public ?User  $user                = null,
        public array  $raw                 = []
    )
    {
    }
}
