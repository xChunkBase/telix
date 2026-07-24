<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteChatStickerSet
{
    public function deleteChatStickerSet(int|string $chatId): bool
    {
        return $this->call(new RawMethod('deleteChatStickerSet', [
            'chat_id' => $chatId,
        ], ResponseMap::of('deleteChatStickerSet')));
    }
}
