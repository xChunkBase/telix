<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class GiveawayCompleted
{
    public function __construct(
        public int      $winnerCount,
        public ?int     $unclaimedPrizeCount = null,
        public ?Message $giveawayMessage     = null,
        public ?bool    $isStarGiveaway      = null,
        public array    $raw                 = []
    )
    {
    }
}
