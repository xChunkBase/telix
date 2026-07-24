<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatMemberBanned
{
    public function __construct(
        public string $status,
        public User   $user,
        public int    $untilDate,
        public array  $raw       = []
    )
    {
    }
}
