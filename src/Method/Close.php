<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait Close
{
    public function close(): bool
    {
        return $this->call(new RawMethod('close', [], ResponseMap::of('close')));
    }
}
