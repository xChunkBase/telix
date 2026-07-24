<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class UniqueGift
{
    public function __construct(
        public string             $giftId,
        public string             $baseName,
        public string             $name,
        public int                $number,
        public UniqueGiftModel    $model,
        public UniqueGiftSymbol   $symbol,
        public UniqueGiftBackdrop $backdrop,
        public ?bool              $isPremium        = null,
        public ?bool              $isBurned         = null,
        public ?bool              $isFromBlockchain = null,
        public ?UniqueGiftColors  $colors           = null,
        public ?Chat              $publisherChat    = null,
        public array              $raw              = []
    )
    {
    }
}
