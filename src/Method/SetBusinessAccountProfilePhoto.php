<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetBusinessAccountProfilePhoto
{
    public function setBusinessAccountProfilePhoto(
        string $businessConnectionId,
        mixed  $photo,
        ?bool  $isPublic             = null
    ): bool
    {
        return $this->call(new RawMethod('setBusinessAccountProfilePhoto', [
            'business_connection_id' => $businessConnectionId,
            'photo'                  => $photo,
            'is_public'              => $isPublic,
        ], ResponseMap::of('setBusinessAccountProfilePhoto')));
    }
}
