<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait AnswerGuestQuery
{
    public function answerGuestQuery(
        string $guestQueryId,
        mixed  $result
    ): \Telix\Type\SentGuestMessage
    {
        return $this->call(new RawMethod('answerGuestQuery', [
            'guest_query_id' => $guestQueryId,
            'result'         => $result,
        ], ResponseMap::of('answerGuestQuery')));
    }
}
