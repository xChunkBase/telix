<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ReopenGeneralForumTopic
{
    public function reopenGeneralForumTopic(int|string $chatId): bool
    {
        return $this->call(new RawMethod('reopenGeneralForumTopic', [
            'chat_id' => $chatId,
        ], ResponseMap::of('reopenGeneralForumTopic')));
    }
}
