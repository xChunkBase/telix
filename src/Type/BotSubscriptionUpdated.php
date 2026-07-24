<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BotSubscriptionUpdated
{
    public function __construct(
        public User   $user,
        public string $invoicePayload,
        public string $state,
        public array  $raw            = []
    )
    {
    }
}
