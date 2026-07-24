<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait VerifyChat
{
    public function verifyChat(
        int|string $chatId,
        ?string    $customDescription = null
    ): bool
    {
        return $this->call(new RawMethod('verifyChat', [
            'chat_id'            => $chatId,
            'custom_description' => $customDescription,
        ], ResponseMap::of('verifyChat')));
    }
}
