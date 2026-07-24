<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class TransactionPartnerTelegramApi
{
    public function __construct(
        public string $type,
        public int    $requestCount,
        public array  $raw          = []
    )
    {
    }
}
