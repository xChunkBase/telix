<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class TransactionPartnerChat
{
    public function __construct(
        public string $type,
        public Chat   $chat,
        public ?Gift  $gift = null,
        public array  $raw  = []
    )
    {
    }
}
