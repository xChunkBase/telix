<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditGeneralForumTopic
{
    public function editGeneralForumTopic(
        int|string $chatId,
        string     $name
    ): bool
    {
        return $this->call(new RawMethod('editGeneralForumTopic', [
            'chat_id' => $chatId,
            'name'    => $name,
        ], ResponseMap::of('editGeneralForumTopic')));
    }
}
