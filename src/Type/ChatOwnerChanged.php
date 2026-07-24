<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatOwnerChanged
{
    public function __construct(
        public User  $newOwner,
        public array $raw      = []
    )
    {
    }
}
