<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CloseForumTopic
{
    public function closeForumTopic(
        int|string $chatId,
        int        $messageThreadId
    ): bool
    {
        return $this->call(new RawMethod('closeForumTopic', [
            'chat_id'           => $chatId,
            'message_thread_id' => $messageThreadId,
        ], ResponseMap::of('closeForumTopic')));
    }
}
