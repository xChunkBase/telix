<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteChatPhoto
{
    public function deleteChatPhoto(int|string $chatId): bool
    {
        return $this->call(new RawMethod('deleteChatPhoto', [
            'chat_id' => $chatId,
        ], ResponseMap::of('deleteChatPhoto')));
    }
}
