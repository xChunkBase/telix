<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait StopPoll
{
    public function stopPoll(
        int|string $chatId,
        int        $messageId,
        ?string    $businessConnectionId = null,
        mixed      $replyMarkup          = null
    ): \Telix\Type\Poll
    {
        return $this->call(new RawMethod('stopPoll', [
            'chat_id'                => $chatId,
            'message_id'             => $messageId,
            'business_connection_id' => $businessConnectionId,
            'reply_markup'           => $replyMarkup,
        ], ResponseMap::of('stopPoll')));
    }
}
