<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatMemberUpdated
{
    public function __construct(
        public Chat            $chat,
        public User            $from,
        public int             $date,
        public ChatMember      $oldChatMember,
        public ChatMember      $newChatMember,
        public ?ChatInviteLink $inviteLink              = null,
        public ?bool           $viaJoinRequest          = null,
        public ?bool           $viaChatFolderInviteLink = null
    )
    {
    }

    public function joined(): bool
    {
        return !$this->oldChatMember->isMember() && $this->newChatMember->isMember();
    }

    public function left(): bool
    {
        return $this->oldChatMember->isMember() && !$this->newChatMember->isMember();
    }
}
