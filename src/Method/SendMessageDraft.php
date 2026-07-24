<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendMessageDraft
{
    public function sendMessageDraft(
        int                         $chatId,
        int                         $draftId,
        ?int                        $messageThreadId = null,
        ?string                     $text            = null,
        ?\Telix\Type\Enum\ParseMode $parseMode       = null,
        ?array                      $entities        = null
    ): bool
    {
        return $this->call(new RawMethod('sendMessageDraft', [
            'chat_id'           => $chatId,
            'draft_id'          => $draftId,
            'message_thread_id' => $messageThreadId,
            'text'              => $text,
            'parse_mode'        => $parseMode,
            'entities'          => $entities,
        ], ResponseMap::of('sendMessageDraft')));
    }
}
