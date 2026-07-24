<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetManagedBotAccessSettings
{
    public function getManagedBotAccessSettings(int $userId): \Telix\Type\BotAccessSettings
    {
        return $this->call(new RawMethod('getManagedBotAccessSettings', [
            'user_id' => $userId,
        ], ResponseMap::of('getManagedBotAccessSettings')));
    }
}
