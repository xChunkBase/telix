<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetUpdates
{
    public function getUpdates(
        ?int   $offset         = null,
        ?int   $limit          = null,
        ?int   $timeout        = null,
        ?array $allowedUpdates = null
    ): array
    {
        return $this->call(new RawMethod('getUpdates', [
            'offset'          => $offset,
            'limit'           => $limit,
            'timeout'         => $timeout,
            'allowed_updates' => $allowedUpdates,
        ], ResponseMap::of('getUpdates')));
    }
}
