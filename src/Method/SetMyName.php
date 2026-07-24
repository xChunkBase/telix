<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetMyName
{
    public function setMyName(
        ?string $name         = null,
        ?string $languageCode = null
    ): bool
    {
        return $this->call(new RawMethod('setMyName', [
            'name'          => $name,
            'language_code' => $languageCode,
        ], ResponseMap::of('setMyName')));
    }
}
