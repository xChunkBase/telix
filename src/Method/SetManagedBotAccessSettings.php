<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetManagedBotAccessSettings
{
    public function setManagedBotAccessSettings(
        int    $userId,
        bool   $isAccessRestricted,
        ?array $addedUserIds       = null
    ): bool
    {
        return $this->call(new RawMethod('setManagedBotAccessSettings', [
            'user_id'              => $userId,
            'is_access_restricted' => $isAccessRestricted,
            'added_user_ids'       => $addedUserIds,
        ], ResponseMap::of('setManagedBotAccessSettings')));
    }
}
