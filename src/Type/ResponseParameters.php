<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ResponseParameters
{
    public function __construct(
        public ?int  $migrateToChatId = null,
        public ?int  $retryAfter      = null,
        public array $raw             = []
    )
    {
    }
}
