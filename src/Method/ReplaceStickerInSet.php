<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ReplaceStickerInSet
{
    public function replaceStickerInSet(
        int    $userId,
        string $name,
        string $oldSticker,
        mixed  $sticker
    ): bool
    {
        return $this->call(new RawMethod('replaceStickerInSet', [
            'user_id'     => $userId,
            'name'        => $name,
            'old_sticker' => $oldSticker,
            'sticker'     => $sticker,
        ], ResponseMap::of('replaceStickerInSet')));
    }
}
