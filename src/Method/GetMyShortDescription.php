<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetMyShortDescription
{
    public function getMyShortDescription(?string $languageCode = null): \Telix\Type\BotShortDescription
    {
        return $this->call(new RawMethod('getMyShortDescription', [
            'language_code' => $languageCode,
        ], ResponseMap::of('getMyShortDescription')));
    }
}
