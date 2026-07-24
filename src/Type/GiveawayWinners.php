<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class GiveawayWinners
{
    public function __construct(
        public Chat    $chat,
        public int     $giveawayMessageId,
        public int     $winnersSelectionDate,
        public int     $winnerCount,
        #[ArrayOf(User::class)]
        public array   $winners,
        public ?int    $additionalChatCount           = null,
        public ?int    $prizeStarCount                = null,
        public ?int    $premiumSubscriptionMonthCount = null,
        public ?int    $unclaimedPrizeCount           = null,
        public ?bool   $onlyNewMembers                = null,
        public ?bool   $wasRefunded                   = null,
        public ?string $prizeDescription              = null,
        public array   $raw                           = []
    )
    {
    }
}
