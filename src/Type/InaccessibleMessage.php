<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InaccessibleMessage
{
    public function __construct(
        public Chat  $chat,
        public int   $messageId,
        public int   $date,
        public array $raw       = []
    )
    {
    }
}
