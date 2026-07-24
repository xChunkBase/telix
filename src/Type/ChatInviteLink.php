<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatInviteLink
{
    public function __construct(
        public string  $inviteLink,
        public User    $creator,
        public bool    $createsJoinRequest,
        public bool    $isPrimary,
        public bool    $isRevoked,
        public ?string $name                    = null,
        public ?int    $expireDate              = null,
        public ?int    $memberLimit             = null,
        public ?int    $pendingJoinRequestCount = null,
        public ?int    $subscriptionPeriod      = null,
        public ?int    $subscriptionPrice       = null,
        public array   $raw                     = []
    )
    {
    }
}
