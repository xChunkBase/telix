<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait LeaveChat
{
    public function leaveChat(int|string $chatId): bool
    {
        return $this->call(new RawMethod('leaveChat', [
            'chat_id' => $chatId,
        ], ResponseMap::of('leaveChat')));
    }
}
