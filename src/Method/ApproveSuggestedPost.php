<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ApproveSuggestedPost
{
    public function approveSuggestedPost(
        int  $chatId,
        int  $messageId,
        ?int $sendDate  = null
    ): bool
    {
        return $this->call(new RawMethod('approveSuggestedPost', [
            'chat_id'    => $chatId,
            'message_id' => $messageId,
            'send_date'  => $sendDate,
        ], ResponseMap::of('approveSuggestedPost')));
    }
}
