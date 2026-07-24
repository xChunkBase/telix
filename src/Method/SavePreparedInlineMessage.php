<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SavePreparedInlineMessage
{
    public function savePreparedInlineMessage(
        int   $userId,
        mixed $result,
        ?bool $allowUserChats    = null,
        ?bool $allowBotChats     = null,
        ?bool $allowGroupChats   = null,
        ?bool $allowChannelChats = null
    ): \Telix\Type\PreparedInlineMessage
    {
        return $this->call(new RawMethod('savePreparedInlineMessage', [
            'user_id'             => $userId,
            'result'              => $result,
            'allow_user_chats'    => $allowUserChats,
            'allow_bot_chats'     => $allowBotChats,
            'allow_group_chats'   => $allowGroupChats,
            'allow_channel_chats' => $allowChannelChats,
        ], ResponseMap::of('savePreparedInlineMessage')));
    }
}
