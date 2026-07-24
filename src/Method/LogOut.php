<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait LogOut
{
    public function logOut(): bool
    {
        return $this->call(new RawMethod('logOut', [], ResponseMap::of('logOut')));
    }
}
