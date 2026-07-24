<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditForumTopic
{
    public function editForumTopic(
        int|string $chatId,
        int        $messageThreadId,
        ?string    $name              = null,
        ?string    $iconCustomEmojiId = null
    ): bool
    {
        return $this->call(new RawMethod('editForumTopic', [
            'chat_id'              => $chatId,
            'message_thread_id'    => $messageThreadId,
            'name'                 => $name,
            'icon_custom_emoji_id' => $iconCustomEmojiId,
        ], ResponseMap::of('editForumTopic')));
    }
}
