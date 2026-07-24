<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatBoostSourceGiveaway
{
    public function __construct(
        public string $source,
        public int    $giveawayMessageId,
        public ?User  $user              = null,
        public ?int   $prizeStarCount    = null,
        public ?bool  $isUnclaimed       = null,
        public array  $raw               = []
    )
    {
    }
}
