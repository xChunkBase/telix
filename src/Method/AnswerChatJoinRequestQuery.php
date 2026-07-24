<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait AnswerChatJoinRequestQuery
{
    public function answerChatJoinRequestQuery(
        string $chatJoinRequestQueryId,
        string $result
    ): bool
    {
        return $this->call(new RawMethod('answerChatJoinRequestQuery', [
            'chat_join_request_query_id' => $chatJoinRequestQueryId,
            'result'                     => $result,
        ], ResponseMap::of('answerChatJoinRequestQuery')));
    }
}
