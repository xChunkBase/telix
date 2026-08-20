<?php
declare(strict_types=1);

namespace Telix\Client;

enum Direction: string
{
    case Upload   = 'upload';
    case Download = 'download';
}
