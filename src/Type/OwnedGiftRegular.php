<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class OwnedGiftRegular
{
    public function __construct(
        public string  $type,
        public Gift    $gift,
        public int     $sendDate,
        public ?string $ownedGiftId             = null,
        public ?User   $senderUser              = null,
        public ?string $text                    = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array  $entities                = null,
        public ?bool   $isPrivate               = null,
        public ?bool   $isSaved                 = null,
        public ?bool   $canBeUpgraded           = null,
        public ?bool   $wasRefunded             = null,
        public ?int    $convertStarCount        = null,
        public ?int    $prepaidUpgradeStarCount = null,
        public ?bool   $isUpgradeSeparate       = null,
        public ?int    $uniqueGiftNumber        = null,
        public array   $raw                     = []
    )
    {
    }
}
