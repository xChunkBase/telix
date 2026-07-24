<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UnhideGeneralForumTopic
{
    public function unhideGeneralForumTopic(int|string $chatId): bool
    {
        return $this->call(new RawMethod('unhideGeneralForumTopic', [
            'chat_id' => $chatId,
        ], ResponseMap::of('unhideGeneralForumTopic')));
    }
}
