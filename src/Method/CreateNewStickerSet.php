<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CreateNewStickerSet
{
    public function createNewStickerSet(
        int     $userId,
        string  $name,
        string  $title,
        array   $stickers,
        ?string $stickerType     = null,
        ?bool   $needsRepainting = null
    ): bool
    {
        return $this->call(new RawMethod('createNewStickerSet', [
            'user_id'          => $userId,
            'name'             => $name,
            'title'            => $title,
            'stickers'         => $stickers,
            'sticker_type'     => $stickerType,
            'needs_repainting' => $needsRepainting,
        ], ResponseMap::of('createNewStickerSet')));
    }
}
