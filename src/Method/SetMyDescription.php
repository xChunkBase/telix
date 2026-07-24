<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetMyDescription
{
    public function setMyDescription(
        ?string $description  = null,
        ?string $languageCode = null
    ): bool
    {
        return $this->call(new RawMethod('setMyDescription', [
            'description'   => $description,
            'language_code' => $languageCode,
        ], ResponseMap::of('setMyDescription')));
    }
}
