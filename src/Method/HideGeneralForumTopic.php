<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait HideGeneralForumTopic
{
    public function hideGeneralForumTopic(int|string $chatId): bool
    {
        return $this->call(new RawMethod('hideGeneralForumTopic', [
            'chat_id' => $chatId,
        ], ResponseMap::of('hideGeneralForumTopic')));
    }
}
