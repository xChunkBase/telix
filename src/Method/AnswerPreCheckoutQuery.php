<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait AnswerPreCheckoutQuery
{
    public function answerPreCheckoutQuery(
        string  $preCheckoutQueryId,
        bool    $ok,
        ?string $errorMessage       = null
    ): bool
    {
        return $this->call(new RawMethod('answerPreCheckoutQuery', [
            'pre_checkout_query_id' => $preCheckoutQueryId,
            'ok'                    => $ok,
            'error_message'         => $errorMessage,
        ], ResponseMap::of('answerPreCheckoutQuery')));
    }
}
