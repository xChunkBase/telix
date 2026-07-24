<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CreateForumTopic
{
    public function createForumTopic(
        int|string $chatId,
        string     $name,
        ?int       $iconColor         = null,
        ?string    $iconCustomEmojiId = null
    ): \Telix\Type\ForumTopic
    {
        return $this->call(new RawMethod('createForumTopic', [
            'chat_id'              => $chatId,
            'name'                 => $name,
            'icon_color'           => $iconColor,
            'icon_custom_emoji_id' => $iconCustomEmojiId,
        ], ResponseMap::of('createForumTopic')));
    }
}
