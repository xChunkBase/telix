<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteMyCommands
{
    public function deleteMyCommands(
        mixed   $scope        = null,
        ?string $languageCode = null
    ): bool
    {
        return $this->call(new RawMethod('deleteMyCommands', [
            'scope'         => $scope,
            'language_code' => $languageCode,
        ], ResponseMap::of('deleteMyCommands')));
    }
}
