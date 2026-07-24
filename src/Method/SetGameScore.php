<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetGameScore
{
    public function setGameScore(
        int     $userId,
        int     $score,
        ?bool   $force              = null,
        ?bool   $disableEditMessage = null,
        ?int    $chatId             = null,
        ?int    $messageId          = null,
        ?string $inlineMessageId    = null
    ): \Telix\Type\Message|bool
    {
        return $this->call(new RawMethod('setGameScore', [
            'user_id'              => $userId,
            'score'                => $score,
            'force'                => $force,
            'disable_edit_message' => $disableEditMessage,
            'chat_id'              => $chatId,
            'message_id'           => $messageId,
            'inline_message_id'    => $inlineMessageId,
        ], ResponseMap::of('setGameScore')));
    }
}
