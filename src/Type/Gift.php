<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Gift
{
    public function __construct(
        public string          $id,
        public Sticker         $sticker,
        public int             $starCount,
        public ?int            $upgradeStarCount       = null,
        public ?bool           $isPremium              = null,
        public ?bool           $hasColors              = null,
        public ?int            $totalCount             = null,
        public ?int            $remainingCount         = null,
        public ?int            $personalTotalCount     = null,
        public ?int            $personalRemainingCount = null,
        public ?GiftBackground $background             = null,
        public ?int            $uniqueGiftVariantCount = null,
        public ?Chat           $publisherChat          = null,
        public array           $raw                    = []
    )
    {
    }
}
