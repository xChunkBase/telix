<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetStickerEmojiList
{
    public function setStickerEmojiList(
        string $sticker,
        array  $emojiList
    ): bool
    {
        return $this->call(new RawMethod('setStickerEmojiList', [
            'sticker'    => $sticker,
            'emoji_list' => $emojiList,
        ], ResponseMap::of('setStickerEmojiList')));
    }
}
