<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatMember
{
    public function __construct(
        public string $status,
        public User   $user,
        public array  $raw    = []
    )
    {
    }

    public function isMember(): bool
    {
        return \in_array($this->status, ['creator', 'administrator', 'member', 'restricted'], true);
    }

    public function isAdmin(): bool
    {
        return $this->status === 'creator' || $this->status === 'administrator';
    }
}
