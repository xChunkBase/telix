<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetChatDescription
{
    public function setChatDescription(
        int|string $chatId,
        ?string    $description = null
    ): bool
    {
        return $this->call(new RawMethod('setChatDescription', [
            'chat_id'     => $chatId,
            'description' => $description,
        ], ResponseMap::of('setChatDescription')));
    }
}
