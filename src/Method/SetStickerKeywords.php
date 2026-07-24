<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetStickerKeywords
{
    public function setStickerKeywords(
        string $sticker,
        ?array $keywords = null
    ): bool
    {
        return $this->call(new RawMethod('setStickerKeywords', [
            'sticker'  => $sticker,
            'keywords' => $keywords,
        ], ResponseMap::of('setStickerKeywords')));
    }
}
