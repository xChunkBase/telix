<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BusinessMessagesDeleted
{
    public function __construct(
        public string $businessConnectionId,
        public Chat   $chat,
        public array  $messageIds,
        public array  $raw                  = []
    )
    {
    }
}
