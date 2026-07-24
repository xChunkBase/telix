<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetCustomEmojiStickers
{
    public function getCustomEmojiStickers(array $customEmojiIds): array
    {
        return $this->call(new RawMethod('getCustomEmojiStickers', [
            'custom_emoji_ids' => $customEmojiIds,
        ], ResponseMap::of('getCustomEmojiStickers')));
    }
}
