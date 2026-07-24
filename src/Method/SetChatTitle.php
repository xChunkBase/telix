<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetChatTitle
{
    public function setChatTitle(
        int|string $chatId,
        string     $title
    ): bool
    {
        return $this->call(new RawMethod('setChatTitle', [
            'chat_id' => $chatId,
            'title'   => $title,
        ], ResponseMap::of('setChatTitle')));
    }
}
