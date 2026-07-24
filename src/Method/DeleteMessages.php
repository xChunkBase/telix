<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteMessages
{
    public function deleteMessages(
        int|string $chatId,
        array      $messageIds
    ): bool
    {
        return $this->call(new RawMethod('deleteMessages', [
            'chat_id'     => $chatId,
            'message_ids' => $messageIds,
        ], ResponseMap::of('deleteMessages')));
    }
}
