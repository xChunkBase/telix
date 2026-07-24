<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetUserProfilePhotos
{
    public function getUserProfilePhotos(
        int  $userId,
        ?int $offset = null,
        ?int $limit  = null
    ): \Telix\Type\UserProfilePhotos
    {
        return $this->call(new RawMethod('getUserProfilePhotos', [
            'user_id' => $userId,
            'offset'  => $offset,
            'limit'   => $limit,
        ], ResponseMap::of('getUserProfilePhotos')));
    }
}
