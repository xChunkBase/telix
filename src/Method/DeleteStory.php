<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteStory
{
    public function deleteStory(
        string $businessConnectionId,
        int    $storyId
    ): bool
    {
        return $this->call(new RawMethod('deleteStory', [
            'business_connection_id' => $businessConnectionId,
            'story_id'               => $storyId,
        ], ResponseMap::of('deleteStory')));
    }
}
