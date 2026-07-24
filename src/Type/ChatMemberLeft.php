<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatMemberLeft
{
    public function __construct(
        public string $status,
        public User   $user,
        public array  $raw    = []
    )
    {
    }
}
