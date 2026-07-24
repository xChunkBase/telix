<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteForumTopic
{
    public function deleteForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): bool
    {
        return $this->call(new RawMethod('deleteForumTopic', [
            'chat_id'           => $chatId,
            'message_thread_id' => $messageThreadId,
        ], ResponseMap::of('deleteForumTopic')));
    }
}
