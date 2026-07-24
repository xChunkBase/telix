<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteEphemeralMessage
{
    public function deleteEphemeralMessage(
        int|string $chatId,
        int        $receiverUserId,
        int        $ephemeralMessageId
    ): bool
    {
        return $this->call(new RawMethod('deleteEphemeralMessage', [
            'chat_id'              => $chatId,
            'receiver_user_id'     => $receiverUserId,
            'ephemeral_message_id' => $ephemeralMessageId,
        ], ResponseMap::of('deleteEphemeralMessage')));
    }
}
