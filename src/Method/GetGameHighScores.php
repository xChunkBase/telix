<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetGameHighScores
{
    public function getGameHighScores(
        int     $userId,
        ?int    $chatId          = null,
        ?int    $messageId       = null,
        ?string $inlineMessageId = null
    ): array
    {
        return $this->call(new RawMethod('getGameHighScores', [
            'user_id'           => $userId,
            'chat_id'           => $chatId,
            'message_id'        => $messageId,
            'inline_message_id' => $inlineMessageId,
        ], ResponseMap::of('getGameHighScores')));
    }
}
