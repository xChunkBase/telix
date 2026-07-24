<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetMyCommands
{
    public function getMyCommands(
        mixed   $scope        = null,
        ?string $languageCode = null
    ): array
    {
        return $this->call(new RawMethod('getMyCommands', [
            'scope'         => $scope,
            'language_code' => $languageCode,
        ], ResponseMap::of('getMyCommands')));
    }
}
