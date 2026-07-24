<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait RevokeChatInviteLink
{
    public function revokeChatInviteLink(
        int|string $chatId,
        string     $inviteLink
    ): \Telix\Type\ChatInviteLink
    {
        return $this->call(new RawMethod('revokeChatInviteLink', [
            'chat_id'     => $chatId,
            'invite_link' => $inviteLink,
        ], ResponseMap::of('revokeChatInviteLink')));
    }
}
