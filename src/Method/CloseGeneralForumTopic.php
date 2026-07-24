<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CloseGeneralForumTopic
{
    public function closeGeneralForumTopic(int|string $chatId): bool
    {
        return $this->call(new RawMethod('closeGeneralForumTopic', [
            'chat_id' => $chatId,
        ], ResponseMap::of('closeGeneralForumTopic')));
    }
}
