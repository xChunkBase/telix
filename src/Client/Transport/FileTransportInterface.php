<?php
declare(strict_types=1);

namespace Telix\Client\Transport;

interface FileTransportInterface
{
    public function fileUrl(string $filePath): string;
    public function download(string $filePath, string $dest, ?callable $onProgress = null): int;
}
