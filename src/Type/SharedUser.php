<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class SharedUser
{
    public function __construct(
        public int     $userId,
        public ?string $firstName = null,
        public ?string $lastName  = null,
        public ?string $username  = null,
        #[ArrayOf(PhotoSize::class)]
        public ?array  $photo     = null,
        public array   $raw       = []
    )
    {
    }
}
