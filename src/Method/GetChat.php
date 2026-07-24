<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetChat
{
    public function getChat(int|string $chatId): \Telix\Type\ChatFullInfo
    {
        return $this->call(new RawMethod('getChat', [
            'chat_id' => $chatId,
        ], ResponseMap::of('getChat')));
    }
}
