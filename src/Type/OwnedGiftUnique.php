<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class OwnedGiftUnique
{
    public function __construct(
        public string     $type,
        public UniqueGift $gift,
        public int        $sendDate,
        public ?string    $ownedGiftId       = null,
        public ?User      $senderUser        = null,
        public ?bool      $isSaved           = null,
        public ?bool      $canBeTransferred  = null,
        public ?int       $transferStarCount = null,
        public ?int       $nextTransferDate  = null,
        public array      $raw               = []
    )
    {
    }
}
