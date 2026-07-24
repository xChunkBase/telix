<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CopyMessages
{
    public function copyMessages(
        int|string $chatId,
        int|string $fromChatId,
        array      $messageIds,
        ?int       $messageThreadId       = null,
        ?int       $directMessagesTopicId = null,
        ?bool      $disableNotification   = null,
        ?bool      $protectContent        = null,
        ?bool      $removeCaption         = null
    ): array
    {
        return $this->call(new RawMethod('copyMessages', [
            'chat_id'                  => $chatId,
            'from_chat_id'             => $fromChatId,
            'message_ids'              => $messageIds,
            'message_thread_id'        => $messageThreadId,
            'direct_messages_topic_id' => $directMessagesTopicId,
            'disable_notification'     => $disableNotification,
            'protect_content'          => $protectContent,
            'remove_caption'           => $removeCaption,
        ], ResponseMap::of('copyMessages')));
    }
}
