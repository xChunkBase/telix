<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetChatPhoto
{
    public function setChatPhoto(
        int|string                   $chatId,
        \Telix\Type\InputFile|string $photo
    ): bool
    {
        return $this->call(new RawMethod('setChatPhoto', [
            'chat_id' => $chatId,
            'photo'   => $photo,
        ], ResponseMap::of('setChatPhoto')));
    }
}
