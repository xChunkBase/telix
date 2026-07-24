<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SentGuestMessage
{
    public function __construct(
        public string $inlineMessageId,
        public array  $raw             = []
    )
    {
    }
}
