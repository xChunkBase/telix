<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditStory
{
    public function editStory(
        string                      $businessConnectionId,
        int                         $storyId,
        mixed                       $content,
        ?string                     $caption              = null,
        ?\Telix\Type\Enum\ParseMode $parseMode            = null,
        ?array                      $captionEntities      = null,
        ?array                      $areas                = null
    ): \Telix\Type\Story
    {
        return $this->call(new RawMethod('editStory', [
            'business_connection_id' => $businessConnectionId,
            'story_id'               => $storyId,
            'content'                => $content,
            'caption'                => $caption,
            'parse_mode'             => $parseMode,
            'caption_entities'       => $captionEntities,
            'areas'                  => $areas,
        ], ResponseMap::of('editStory')));
    }
}
