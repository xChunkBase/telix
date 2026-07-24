<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatMemberAdministrator
{
    public function __construct(
        public string  $status,
        public User    $user,
        public bool    $canBeEdited,
        public bool    $isAnonymous,
        public bool    $canManageChat,
        public bool    $canDeleteMessages,
        public bool    $canManageVideoChats,
        public bool    $canRestrictMembers,
        public bool    $canPromoteMembers,
        public bool    $canChangeInfo,
        public bool    $canInviteUsers,
        public bool    $canPostStories,
        public bool    $canEditStories,
        public bool    $canDeleteStories,
        public ?bool   $canPostMessages         = null,
        public ?bool   $canEditMessages         = null,
        public ?bool   $canPinMessages          = null,
        public ?bool   $canManageTopics         = null,
        public ?bool   $canManageDirectMessages = null,
        public ?bool   $canManageTags           = null,
        public ?string $customTitle             = null,
        public array   $raw                     = []
    )
    {
    }
}
