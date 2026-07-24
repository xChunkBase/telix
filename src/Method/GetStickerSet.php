<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetStickerSet
{
    public function getStickerSet(string $name): \Telix\Type\StickerSet
    {
        return $this->call(new RawMethod('getStickerSet', [
            'name' => $name,
        ], ResponseMap::of('getStickerSet')));
    }
}
