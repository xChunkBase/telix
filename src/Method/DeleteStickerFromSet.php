<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteStickerFromSet
{
    public function deleteStickerFromSet(string $sticker): bool
    {
        return $this->call(new RawMethod('deleteStickerFromSet', [
            'sticker' => $sticker,
        ], ResponseMap::of('deleteStickerFromSet')));
    }
}
