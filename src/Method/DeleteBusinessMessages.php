<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteBusinessMessages
{
    public function deleteBusinessMessages(
        string $businessConnectionId,
        array  $messageIds
    ): bool
    {
        return $this->call(new RawMethod('deleteBusinessMessages', [
            'business_connection_id' => $businessConnectionId,
            'message_ids'            => $messageIds,
        ], ResponseMap::of('deleteBusinessMessages')));
    }
}
