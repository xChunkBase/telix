<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait AnswerCallbackQuery
{
    public function answerCallbackQuery(
        string  $callbackQueryId,
        ?string $text            = null,
        ?bool   $showAlert       = null,
        ?string $url             = null,
        ?int    $cacheTime       = null
    ): bool
    {
        return $this->call(new RawMethod('answerCallbackQuery', [
            'callback_query_id' => $callbackQueryId,
            'text'              => $text,
            'show_alert'        => $showAlert,
            'url'               => $url,
            'cache_time'        => $cacheTime,
        ], ResponseMap::of('answerCallbackQuery')));
    }
}
