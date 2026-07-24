<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ReopenForumTopic
{
    public function reopenForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): bool
    {
        return $this->call(new RawMethod('reopenForumTopic', [
            'chat_id'           => $chatId,
            'message_thread_id' => $messageThreadId,
        ], ResponseMap::of('reopenForumTopic')));
    }
}
