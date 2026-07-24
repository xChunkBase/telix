<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BusinessBotRights
{
    public function __construct(
        public ?bool $canReply                   = null,
        public ?bool $canReadMessages            = null,
        public ?bool $canDeleteSentMessages      = null,
        public ?bool $canDeleteAllMessages       = null,
        public ?bool $canEditName                = null,
        public ?bool $canEditBio                 = null,
        public ?bool $canEditProfilePhoto        = null,
        public ?bool $canEditUsername            = null,
        public ?bool $canChangeGiftSettings      = null,
        public ?bool $canViewGiftsAndStars       = null,
        public ?bool $canConvertGiftsToStars     = null,
        public ?bool $canTransferAndUpgradeGifts = null,
        public ?bool $canTransferStars           = null,
        public ?bool $canManageStories           = null,
        public array $raw                        = []
    )
    {
    }
}
