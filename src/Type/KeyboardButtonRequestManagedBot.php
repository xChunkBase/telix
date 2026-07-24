<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class KeyboardButtonRequestManagedBot
{
    public function __construct(
        public int     $requestId,
        public ?string $suggestedName     = null,
        public ?string $suggestedUsername = null,
        public array   $raw               = []
    )
    {
    }
}
