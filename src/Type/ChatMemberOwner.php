<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatMemberOwner
{
    public function __construct(
        public string  $status,
        public User    $user,
        public bool    $isAnonymous,
        public ?string $customTitle = null,
        public array   $raw         = []
    )
    {
    }
}
