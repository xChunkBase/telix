<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetMyStarBalance
{
    public function getMyStarBalance(): \Telix\Type\StarAmount
    {
        return $this->call(new RawMethod('getMyStarBalance', [], ResponseMap::of('getMyStarBalance')));
    }
}
