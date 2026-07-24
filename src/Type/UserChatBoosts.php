<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class UserChatBoosts
{
    public function __construct(
        #[ArrayOf(ChatBoost::class)]
        public array $boosts,
        public array $raw    = []
    )
    {
    }
}
