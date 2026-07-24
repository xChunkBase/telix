<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetMe
{
    public function getMe(): \Telix\Type\User
    {
        return $this->call(new RawMethod('getMe', [], ResponseMap::of('getMe')));
    }
}
