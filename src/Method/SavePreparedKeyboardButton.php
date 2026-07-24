<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SavePreparedKeyboardButton
{
    public function savePreparedKeyboardButton(
        int   $userId,
        mixed $button
    ): \Telix\Type\PreparedKeyboardButton
    {
        return $this->call(new RawMethod('savePreparedKeyboardButton', [
            'user_id' => $userId,
            'button'  => $button,
        ], ResponseMap::of('savePreparedKeyboardButton')));
    }
}
