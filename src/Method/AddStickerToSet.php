<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait AddStickerToSet
{
    public function addStickerToSet(
        int    $userId,
        string $name,
        mixed  $sticker
    ): bool
    {
        return $this->call(new RawMethod('addStickerToSet', [
            'user_id' => $userId,
            'name'    => $name,
            'sticker' => $sticker,
        ], ResponseMap::of('addStickerToSet')));
    }
}
