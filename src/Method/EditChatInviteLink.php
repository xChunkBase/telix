<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditChatInviteLink
{
    public function editChatInviteLink(
        int|string $chatId,
        string     $inviteLink,
        ?string    $name               = null,
        ?int       $expireDate         = null,
        ?int       $memberLimit        = null,
        ?bool      $createsJoinRequest = null
    ): \Telix\Type\ChatInviteLink
    {
        return $this->call(new RawMethod('editChatInviteLink', [
            'chat_id'              => $chatId,
            'invite_link'          => $inviteLink,
            'name'                 => $name,
            'expire_date'          => $expireDate,
            'member_limit'         => $memberLimit,
            'creates_join_request' => $createsJoinRequest,
        ], ResponseMap::of('editChatInviteLink')));
    }
}
