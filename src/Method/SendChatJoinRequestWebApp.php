<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendChatJoinRequestWebApp
{
    public function sendChatJoinRequestWebApp(
        string $chatJoinRequestQueryId,
        string $webAppUrl
    ): bool
    {
        return $this->call(new RawMethod('sendChatJoinRequestWebApp', [
            'chat_join_request_query_id' => $chatJoinRequestQueryId,
            'web_app_url'                => $webAppUrl,
        ], ResponseMap::of('sendChatJoinRequestWebApp')));
    }
}
