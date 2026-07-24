<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetChatStickerSet
{
    public function setChatStickerSet(
        int|string $chatId,
        string     $stickerSetName
    ): bool
    {
        return $this->call(new RawMethod('setChatStickerSet', [
            'chat_id'          => $chatId,
            'sticker_set_name' => $stickerSetName,
        ], ResponseMap::of('setChatStickerSet')));
    }
}
