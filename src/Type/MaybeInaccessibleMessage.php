<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MaybeInaccessibleMessage
{
    public function __construct(
        public int   $messageId,
        public int   $date,
        public Chat  $chat,
        public array $raw       = []
    )
    {
    }
}
