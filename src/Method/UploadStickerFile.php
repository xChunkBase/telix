<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait UploadStickerFile
{
    public function uploadStickerFile(
        int                          $userId,
        \Telix\Type\InputFile|string $sticker,
        string                       $stickerFormat
    ): \Telix\Type\File
    {
        return $this->call(new RawMethod('uploadStickerFile', [
            'user_id'        => $userId,
            'sticker'        => $sticker,
            'sticker_format' => $stickerFormat,
        ], ResponseMap::of('uploadStickerFile')));
    }
}
