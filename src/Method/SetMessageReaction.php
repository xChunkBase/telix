<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetMessageReaction
{
    public function setMessageReaction(
        int|string $chatId,
        int        $messageId,
        ?array     $reaction  = null,
        ?bool      $isBig     = null
    ): bool
    {
        return $this->call(new RawMethod('setMessageReaction', [
            'chat_id'    => $chatId,
            'message_id' => $messageId,
            'reaction'   => $reaction,
            'is_big'     => $isBig,
        ], ResponseMap::of('setMessageReaction')));
    }
}
