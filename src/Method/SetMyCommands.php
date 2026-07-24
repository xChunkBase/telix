<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetMyCommands
{
    public function setMyCommands(
        array   $commands,
        mixed   $scope        = null,
        ?string $languageCode = null
    ): bool
    {
        return $this->call(new RawMethod('setMyCommands', [
            'commands'      => $commands,
            'scope'         => $scope,
            'language_code' => $languageCode,
        ], ResponseMap::of('setMyCommands')));
    }
}
