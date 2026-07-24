<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait RemoveChatVerification
{
    public function removeChatVerification(int|string $chatId): bool
    {
        return $this->call(new RawMethod('removeChatVerification', [
            'chat_id' => $chatId,
        ], ResponseMap::of('removeChatVerification')));
    }
}
