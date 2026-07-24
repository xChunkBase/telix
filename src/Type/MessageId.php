<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageId
{
    public function __construct(
        public int   $messageId,
        public array $raw       = []
    )
    {
    }
}
