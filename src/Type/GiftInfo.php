<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class GiftInfo
{
    public function __construct(
        public Gift    $gift,
        public ?string $ownedGiftId             = null,
        public ?int    $convertStarCount        = null,
        public ?int    $prepaidUpgradeStarCount = null,
        public ?bool   $isUpgradeSeparate       = null,
        public ?bool   $canBeUpgraded           = null,
        public ?string $text                    = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array  $entities                = null,
        public ?bool   $isPrivate               = null,
        public ?int    $uniqueGiftNumber        = null,
        public array   $raw                     = []
    )
    {
    }
}
