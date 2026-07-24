<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetMyShortDescription
{
    public function setMyShortDescription(
        ?string $shortDescription = null,
        ?string $languageCode     = null
    ): bool
    {
        return $this->call(new RawMethod('setMyShortDescription', [
            'short_description' => $shortDescription,
            'language_code'     => $languageCode,
        ], ResponseMap::of('setMyShortDescription')));
    }
}
