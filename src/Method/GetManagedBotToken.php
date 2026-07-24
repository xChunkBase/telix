<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetManagedBotToken
{
    public function getManagedBotToken(int $userId): string
    {
        return $this->call(new RawMethod('getManagedBotToken', [
            'user_id' => $userId,
        ], ResponseMap::of('getManagedBotToken')));
    }
}
