<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetFile
{
    public function getFile(string $fileId): \Telix\Type\File
    {
        return $this->call(new RawMethod('getFile', [
            'file_id' => $fileId,
        ], ResponseMap::of('getFile')));
    }
}
