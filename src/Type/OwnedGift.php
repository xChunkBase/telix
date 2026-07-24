<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class OwnedGift
{
    public function __construct(
        public string  $type,
        public Gift    $gift,
        public int     $sendDate,
        public ?string $ownedGiftId = null,
        public ?User   $senderUser  = null,
        public ?bool   $isSaved     = null,
        public array   $raw         = []
    )
    {
    }
}
