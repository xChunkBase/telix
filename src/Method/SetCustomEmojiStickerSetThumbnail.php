<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetCustomEmojiStickerSetThumbnail
{
    public function setCustomEmojiStickerSetThumbnail(
        string  $name,
        ?string $customEmojiId = null
    ): bool
    {
        return $this->call(new RawMethod('setCustomEmojiStickerSetThumbnail', [
            'name'            => $name,
            'custom_emoji_id' => $customEmojiId,
        ], ResponseMap::of('setCustomEmojiStickerSetThumbnail')));
    }
}
