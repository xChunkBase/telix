<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextBotCommand
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public string   $botCommand,
        public array    $raw        = []
    )
    {
    }
}
