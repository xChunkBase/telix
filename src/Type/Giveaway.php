<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class Giveaway
{
    public function __construct(
        #[ArrayOf(Chat::class)]
        public array   $chats,
        public int     $winnersSelectionDate,
        public int     $winnerCount,
        public ?bool   $onlyNewMembers                = null,
        public ?bool   $hasPublicWinners              = null,
        public ?string $prizeDescription              = null,
        public ?array  $countryCodes                  = null,
        public ?int    $prizeStarCount                = null,
        public ?int    $premiumSubscriptionMonthCount = null,
        public array   $raw                           = []
    )
    {
    }
}
