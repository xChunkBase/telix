<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CreateChatInviteLink
{
    public function createChatInviteLink(
        int|string $chatId,
        ?string    $name               = null,
        ?int       $expireDate         = null,
        ?int       $memberLimit        = null,
        ?bool      $createsJoinRequest = null
    ): \Telix\Type\ChatInviteLink
    {
        return $this->call(new RawMethod('createChatInviteLink', [
            'chat_id'              => $chatId,
            'name'                 => $name,
            'expire_date'          => $expireDate,
            'member_limit'         => $memberLimit,
            'creates_join_request' => $createsJoinRequest,
        ], ResponseMap::of('createChatInviteLink')));
    }
}
