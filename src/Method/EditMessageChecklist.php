<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditMessageChecklist
{
    public function editMessageChecklist(
        string     $businessConnectionId,
        int|string $chatId,
        int        $messageId,
        mixed      $checklist,
        mixed      $replyMarkup          = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('editMessageChecklist', [
            'business_connection_id' => $businessConnectionId,
            'chat_id'                => $chatId,
            'message_id'             => $messageId,
            'checklist'              => $checklist,
            'reply_markup'           => $replyMarkup,
        ], ResponseMap::of('editMessageChecklist')));
    }
}
