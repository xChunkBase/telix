<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait VerifyUser
{
    public function verifyUser(
        int     $userId,
        ?string $customDescription = null
    ): bool
    {
        return $this->call(new RawMethod('verifyUser', [
            'user_id'            => $userId,
            'custom_description' => $customDescription,
        ], ResponseMap::of('verifyUser')));
    }
}
