<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait AnswerWebAppQuery
{
    public function answerWebAppQuery(
        string $webAppQueryId,
        mixed  $result
    ): \Telix\Type\SentWebAppMessage
    {
        return $this->call(new RawMethod('answerWebAppQuery', [
            'web_app_query_id' => $webAppQueryId,
            'result'           => $result,
        ], ResponseMap::of('answerWebAppQuery')));
    }
}
