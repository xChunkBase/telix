<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class BotAccessSettings
{
    public function __construct(
        public bool   $isAccessRestricted,
        #[ArrayOf(User::class)]
        public ?array $addedUsers         = null,
        public array  $raw                = []
    )
    {
    }
}
