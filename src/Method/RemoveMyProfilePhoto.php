<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait RemoveMyProfilePhoto
{
    public function removeMyProfilePhoto(): bool
    {
        return $this->call(new RawMethod('removeMyProfilePhoto', [], ResponseMap::of('removeMyProfilePhoto')));
    }
}
