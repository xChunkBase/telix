<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UnpinAllGeneralForumTopicMessages
{
    public function unpinAllGeneralForumTopicMessages(int|string $chatId): bool
    {
        return $this->call(new RawMethod('unpinAllGeneralForumTopicMessages', [
            'chat_id' => $chatId,
        ], ResponseMap::of('unpinAllGeneralForumTopicMessages')));
    }
}
