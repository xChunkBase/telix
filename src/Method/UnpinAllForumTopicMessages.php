<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UnpinAllForumTopicMessages
{
    public function unpinAllForumTopicMessages(
        int|string $chatId,
        int        $messageThreadId
    ): bool
    {
        return $this->call(new RawMethod('unpinAllForumTopicMessages', [
            'chat_id'           => $chatId,
            'message_thread_id' => $messageThreadId,
        ], ResponseMap::of('unpinAllForumTopicMessages')));
    }
}
