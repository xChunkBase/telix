<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait TransferBusinessAccountStars
{
    public function transferBusinessAccountStars(
        string $businessConnectionId,
        int    $starCount
    ): bool
    {
        return $this->call(new RawMethod('transferBusinessAccountStars', [
            'business_connection_id' => $businessConnectionId,
            'star_count'             => $starCount,
        ], ResponseMap::of('transferBusinessAccountStars')));
    }
}
