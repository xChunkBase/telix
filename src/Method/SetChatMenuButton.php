<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetChatMenuButton
{
    public function setChatMenuButton(
        ?int  $chatId     = null,
        mixed $menuButton = null
    ): bool
    {
        return $this->call(new RawMethod('setChatMenuButton', [
            'chat_id'     => $chatId,
            'menu_button' => $menuButton,
        ], ResponseMap::of('setChatMenuButton')));
    }
}
