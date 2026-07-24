<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetMyName
{
    public function getMyName(?string $languageCode = null): \Telix\Type\BotName
    {
        return $this->call(new RawMethod('getMyName', [
            'language_code' => $languageCode,
        ], ResponseMap::of('getMyName')));
    }
}
