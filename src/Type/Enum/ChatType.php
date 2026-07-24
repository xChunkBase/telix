<?php
declare(strict_types=1);

namespace Telix\Type\Enum;

enum ChatType: string
{
    case Private    = 'private';
    case Group      = 'group';
    case Supergroup = 'supergroup';
    case Channel    = 'channel';
    case Sender     = 'sender';

    case Unknown = 'unknown';

    public function isGroupLike(): bool
    {
        return $this === self::Group || $this === self::Supergroup;
    }
}
