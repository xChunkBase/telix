<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BotCommandScopeChat
{
    public function __construct(
        public string     $type,
        public int|string $chatId,
        public array      $raw    = []
    )
    {
    }
}
