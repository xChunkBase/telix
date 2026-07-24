<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetStickerSetThumbnail
{
    public function setStickerSetThumbnail(
        string                            $name,
        int                               $userId,
        string                            $format,
        \Telix\Type\InputFile|string|null $thumbnail = null
    ): bool
    {
        return $this->call(new RawMethod('setStickerSetThumbnail', [
            'name'      => $name,
            'user_id'   => $userId,
            'format'    => $format,
            'thumbnail' => $thumbnail,
        ], ResponseMap::of('setStickerSetThumbnail')));
    }
}
