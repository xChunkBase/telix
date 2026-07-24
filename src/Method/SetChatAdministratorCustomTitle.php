<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetChatAdministratorCustomTitle
{
    public function setChatAdministratorCustomTitle(
        int|string $chatId,
        int        $userId,
        string     $customTitle
    ): bool
    {
        return $this->call(new RawMethod('setChatAdministratorCustomTitle', [
            'chat_id'      => $chatId,
            'user_id'      => $userId,
            'custom_title' => $customTitle,
        ], ResponseMap::of('setChatAdministratorCustomTitle')));
    }
}
