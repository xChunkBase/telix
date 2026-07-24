<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetUserProfileAudios
{
    public function getUserProfileAudios(
        int  $userId,
        ?int $offset = null,
        ?int $limit  = null
    ): \Telix\Type\UserProfileAudios
    {
        return $this->call(new RawMethod('getUserProfileAudios', [
            'user_id' => $userId,
            'offset'  => $offset,
            'limit'   => $limit,
        ], ResponseMap::of('getUserProfileAudios')));
    }
}
