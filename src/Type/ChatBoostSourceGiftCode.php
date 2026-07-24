<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatBoostSourceGiftCode
{
    public function __construct(
        public string $source,
        public User   $user,
        public array  $raw    = []
    )
    {
    }
}
