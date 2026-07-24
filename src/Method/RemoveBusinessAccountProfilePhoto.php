<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait RemoveBusinessAccountProfilePhoto
{
    public function removeBusinessAccountProfilePhoto(
        string $businessConnectionId,
        ?bool  $isPublic             = null
    ): bool
    {
        return $this->call(new RawMethod('removeBusinessAccountProfilePhoto', [
            'business_connection_id' => $businessConnectionId,
            'is_public'              => $isPublic,
        ], ResponseMap::of('removeBusinessAccountProfilePhoto')));
    }
}
