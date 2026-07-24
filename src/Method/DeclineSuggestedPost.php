<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeclineSuggestedPost
{
    public function declineSuggestedPost(
        int     $chatId,
        int     $messageId,
        ?string $comment   = null
    ): bool
    {
        return $this->call(new RawMethod('declineSuggestedPost', [
            'chat_id'    => $chatId,
            'message_id' => $messageId,
            'comment'    => $comment,
        ], ResponseMap::of('declineSuggestedPost')));
    }
}
