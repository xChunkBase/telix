<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ManagedBotUpdated
{
    public function __construct(
        public User  $user,
        public User  $bot,
        public array $raw  = []
    )
    {
    }
}
