<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatMemberMember
{
    public function __construct(
        public string  $status,
        public User    $user,
        public ?string $tag       = null,
        public ?int    $untilDate = null,
        public array   $raw       = []
    )
    {
    }
}
