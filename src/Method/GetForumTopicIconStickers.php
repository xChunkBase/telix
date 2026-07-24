<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetForumTopicIconStickers
{
    public function getForumTopicIconStickers(): array
    {
        return $this->call(new RawMethod('getForumTopicIconStickers', [], ResponseMap::of('getForumTopicIconStickers')));
    }
}
