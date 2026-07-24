<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ManagedBotCreated
{
    public function __construct(
        public User  $bot,
        public array $raw = []
    )
    {
    }
}
