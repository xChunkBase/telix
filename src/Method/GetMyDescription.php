<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetMyDescription
{
    public function getMyDescription(?string $languageCode = null): \Telix\Type\BotDescription
    {
        return $this->call(new RawMethod('getMyDescription', [
            'language_code' => $languageCode,
        ], ResponseMap::of('getMyDescription')));
    }
}
