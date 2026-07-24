<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatOwnerLeft
{
    public function __construct(
        public ?User $newOwner = null,
        public array $raw      = []
    )
    {
    }
}
