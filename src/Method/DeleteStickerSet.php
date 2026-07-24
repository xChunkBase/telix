<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteStickerSet
{
    public function deleteStickerSet(string $name): bool
    {
        return $this->call(new RawMethod('deleteStickerSet', [
            'name' => $name,
        ], ResponseMap::of('deleteStickerSet')));
    }
}
