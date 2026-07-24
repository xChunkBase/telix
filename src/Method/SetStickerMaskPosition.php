<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetStickerMaskPosition
{
    public function setStickerMaskPosition(
        string $sticker,
        mixed  $maskPosition = null
    ): bool
    {
        return $this->call(new RawMethod('setStickerMaskPosition', [
            'sticker'       => $sticker,
            'mask_position' => $maskPosition,
        ], ResponseMap::of('setStickerMaskPosition')));
    }
}
