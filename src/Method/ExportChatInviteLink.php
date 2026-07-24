<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait ExportChatInviteLink
{
    public function exportChatInviteLink(int|string $chatId): string
    {
        return $this->call(new RawMethod('exportChatInviteLink', [
            'chat_id' => $chatId,
        ], ResponseMap::of('exportChatInviteLink')));
    }
}
