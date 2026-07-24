<?php
declare(strict_types=1);

namespace Telix\Type\Enum;

enum ParseMode: string
{
    case Html       = 'HTML';
    case Markdown   = 'Markdown';
    case MarkdownV2 = 'MarkdownV2';
}
