<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatPermissions
{
    public function __construct(
        public ?bool $canSendMessages       = null,
        public ?bool $canSendAudios         = null,
        public ?bool $canSendDocuments      = null,
        public ?bool $canSendPhotos         = null,
        public ?bool $canSendVideos         = null,
        public ?bool $canSendVideoNotes     = null,
        public ?bool $canSendVoiceNotes     = null,
        public ?bool $canSendPolls          = null,
        public ?bool $canSendOtherMessages  = null,
        public ?bool $canAddWebPagePreviews = null,
        public ?bool $canReactToMessages    = null,
        public ?bool $canEditTag            = null,
        public ?bool $canChangeInfo         = null,
        public ?bool $canInviteUsers        = null,
        public ?bool $canPinMessages        = null,
        public ?bool $canManageTopics       = null,
        public array $raw                   = []
    )
    {
    }
}
