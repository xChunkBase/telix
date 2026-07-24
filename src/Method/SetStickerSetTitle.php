<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetStickerSetTitle
{
    public function setStickerSetTitle(
        string $name,
        string $title
    ): bool
    {
        return $this->call(new RawMethod('setStickerSetTitle', [
            'name'  => $name,
            'title' => $title,
        ], ResponseMap::of('setStickerSetTitle')));
    }
}
