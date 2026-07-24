<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetChatMenuButton
{
    public function getChatMenuButton(?int $chatId = null): \Telix\Type\MenuButton
    {
        return $this->call(new RawMethod('getChatMenuButton', [
            'chat_id' => $chatId,
        ], ResponseMap::of('getChatMenuButton')));
    }
}
