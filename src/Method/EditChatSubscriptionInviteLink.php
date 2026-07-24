<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditChatSubscriptionInviteLink
{
    public function editChatSubscriptionInviteLink(
        int|string $chatId,
        string     $inviteLink,
        ?string    $name       = null
    ): \Telix\Type\ChatInviteLink
    {
        return $this->call(new RawMethod('editChatSubscriptionInviteLink', [
            'chat_id'     => $chatId,
            'invite_link' => $inviteLink,
            'name'        => $name,
        ], ResponseMap::of('editChatSubscriptionInviteLink')));
    }
}
