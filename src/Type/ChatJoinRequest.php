<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatJoinRequest
{
    public function __construct(
        public Chat            $chat,
        public User            $from,
        public int             $userChatId,
        public int             $date,
        public ?string         $bio        = null,
        public ?ChatInviteLink $inviteLink = null,
        public ?string         $queryId    = null,
        public array           $raw        = []
    )
    {
    }
}
