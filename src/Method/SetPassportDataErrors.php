<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetPassportDataErrors
{
    public function setPassportDataErrors(
        int   $userId,
        array $errors
    ): bool
    {
        return $this->call(new RawMethod('setPassportDataErrors', [
            'user_id' => $userId,
            'errors'  => $errors,
        ], ResponseMap::of('setPassportDataErrors')));
    }
}
