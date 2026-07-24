<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetChatMemberTag
{
    public function setChatMemberTag(
        int|string $chatId,
        int        $userId,
        ?string    $tag    = null
    ): bool
    {
        return $this->call(new RawMethod('setChatMemberTag', [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'tag'     => $tag,
        ], ResponseMap::of('setChatMemberTag')));
    }
}
