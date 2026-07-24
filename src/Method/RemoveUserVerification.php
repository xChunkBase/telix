<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait RemoveUserVerification
{
    public function removeUserVerification(int $userId): bool
    {
        return $this->call(new RawMethod('removeUserVerification', [
            'user_id' => $userId,
        ], ResponseMap::of('removeUserVerification')));
    }
}
