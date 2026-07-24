<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetStickerPositionInSet
{
    public function setStickerPositionInSet(
        string $sticker,
        int    $position
    ): bool
    {
        return $this->call(new RawMethod('setStickerPositionInSet', [
            'sticker'  => $sticker,
            'position' => $position,
        ], ResponseMap::of('setStickerPositionInSet')));
    }
}
