<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetMyProfilePhoto
{
    public function setMyProfilePhoto(mixed $photo): bool
    {
        return $this->call(new RawMethod('setMyProfilePhoto', [
            'photo' => $photo,
        ], ResponseMap::of('setMyProfilePhoto')));
    }
}
