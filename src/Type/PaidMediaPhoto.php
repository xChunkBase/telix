<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class PaidMediaPhoto
{
    public function __construct(
        public string $type,
        #[ArrayOf(PhotoSize::class)]
        public array  $photo,
        public array  $raw   = []
    )
    {
    }
}
