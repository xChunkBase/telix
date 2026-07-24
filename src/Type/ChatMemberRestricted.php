<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatMemberRestricted
{
    public function __construct(
        public string  $status,
        public User    $user,
        public bool    $isMember,
        public bool    $canSendMessages,
        public bool    $canSendAudios,
        public bool    $canSendDocuments,
        public bool    $canSendPhotos,
        public bool    $canSendVideos,
        public bool    $canSendVideoNotes,
        public bool    $canSendVoiceNotes,
        public bool    $canSendPolls,
        public bool    $canSendOtherMessages,
        public bool    $canAddWebPagePreviews,
        public bool    $canReactToMessages,
        public bool    $canEditTag,
        public bool    $canChangeInfo,
        public bool    $canInviteUsers,
        public bool    $canPinMessages,
        public bool    $canManageTopics,
        public int     $untilDate,
        public ?string $tag                   = null,
        public array   $raw                   = []
    )
    {
    }
}
