<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait PostStory
{
    public function postStory(
        string                      $businessConnectionId,
        mixed                       $content,
        int                         $activePeriod,
        ?string                     $caption              = null,
        ?\Telix\Type\Enum\ParseMode $parseMode            = null,
        ?array                      $captionEntities      = null,
        ?array                      $areas                = null,
        ?bool                       $postToChatPage       = null,
        ?bool                       $protectContent       = null
    ): \Telix\Type\Story
    {
        return $this->call(new RawMethod('postStory', [
            'business_connection_id' => $businessConnectionId,
            'content'                => $content,
            'active_period'          => $activePeriod,
            'caption'                => $caption,
            'parse_mode'             => $parseMode,
            'caption_entities'       => $captionEntities,
            'areas'                  => $areas,
            'post_to_chat_page'      => $postToChatPage,
            'protect_content'        => $protectContent,
        ], ResponseMap::of('postStory')));
    }
}
