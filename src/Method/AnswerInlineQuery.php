<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait AnswerInlineQuery
{
    public function answerInlineQuery(
        string  $inlineQueryId,
        array   $results,
        ?int    $cacheTime     = null,
        ?bool   $isPersonal    = null,
        ?string $nextOffset    = null,
        mixed   $button        = null
    ): bool
    {
        return $this->call(new RawMethod('answerInlineQuery', [
            'inline_query_id' => $inlineQueryId,
            'results'         => $results,
            'cache_time'      => $cacheTime,
            'is_personal'     => $isPersonal,
            'next_offset'     => $nextOffset,
            'button'          => $button,
        ], ResponseMap::of('answerInlineQuery')));
    }
}
