<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class AcceptedGiftTypes
{
    public function __construct(
        public bool  $unlimitedGifts,
        public bool  $limitedGifts,
        public bool  $uniqueGifts,
        public bool  $premiumSubscription,
        public bool  $giftsFromChannels,
        public array $raw                 = []
    )
    {
    }
}
