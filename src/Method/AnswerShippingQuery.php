<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait AnswerShippingQuery
{
    public function answerShippingQuery(
        string  $shippingQueryId,
        bool    $ok,
        ?array  $shippingOptions = null,
        ?string $errorMessage    = null
    ): bool
    {
        return $this->call(new RawMethod('answerShippingQuery', [
            'shipping_query_id' => $shippingQueryId,
            'ok'                => $ok,
            'shipping_options'  => $shippingOptions,
            'error_message'     => $errorMessage,
        ], ResponseMap::of('answerShippingQuery')));
    }
}
