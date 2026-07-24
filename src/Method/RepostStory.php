<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait RepostStory
{
    public function repostStory(
        string $businessConnectionId,
        int    $fromChatId,
        int    $fromStoryId,
        int    $activePeriod,
        ?bool  $postToChatPage       = null,
        ?bool  $protectContent       = null
    ): \Telix\Type\Story
    {
        return $this->call(new RawMethod('repostStory', [
            'business_connection_id' => $businessConnectionId,
            'from_chat_id'           => $fromChatId,
            'from_story_id'          => $fromStoryId,
            'active_period'          => $activePeriod,
            'post_to_chat_page'      => $postToChatPage,
            'protect_content'        => $protectContent,
        ], ResponseMap::of('repostStory')));
    }
}
