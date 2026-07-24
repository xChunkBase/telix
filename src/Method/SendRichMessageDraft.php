<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendRichMessageDraft
{
    public function sendRichMessageDraft(
        int   $chatId,
        int   $draftId,
        mixed $richMessage,
        ?int  $messageThreadId = null
    ): bool
    {
        return $this->call(new RawMethod('sendRichMessageDraft', [
            'chat_id'           => $chatId,
            'draft_id'          => $draftId,
            'rich_message'      => $richMessage,
            'message_thread_id' => $messageThreadId,
        ], ResponseMap::of('sendRichMessageDraft')));
    }
}
