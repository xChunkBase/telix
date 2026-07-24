<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetAvailableGifts
{
    public function getAvailableGifts(): \Telix\Type\Gifts
    {
        return $this->call(new RawMethod('getAvailableGifts', [], ResponseMap::of('getAvailableGifts')));
    }
}
