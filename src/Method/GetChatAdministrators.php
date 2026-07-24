<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetChatAdministrators
{
    public function getChatAdministrators(
        int|string $chatId,
        ?bool      $returnBots = null
    ): array
    {
        return $this->call(new RawMethod('getChatAdministrators', [
            'chat_id'     => $chatId,
            'return_bots' => $returnBots,
        ], ResponseMap::of('getChatAdministrators')));
    }
}
