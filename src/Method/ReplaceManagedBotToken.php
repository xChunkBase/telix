<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ReplaceManagedBotToken
{
    public function replaceManagedBotToken(int $userId): string
    {
        return $this->call(new RawMethod('replaceManagedBotToken', [
            'user_id' => $userId,
        ], ResponseMap::of('replaceManagedBotToken')));
    }
}
