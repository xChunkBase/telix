<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class UniqueGiftInfo
{
    public function __construct(
        public UniqueGift $gift,
        public string     $origin,
        public ?string    $lastResaleCurrency = null,
        public ?int       $lastResaleAmount   = null,
        public ?string    $ownedGiftId        = null,
        public ?int       $transferStarCount  = null,
        public ?int       $nextTransferDate   = null,
        public array      $raw                = []
    )
    {
    }
}
