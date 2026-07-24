<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class ChatShared
{
    public function __construct(
        public int     $requestId,
        public int     $chatId,
        public ?string $title     = null,
        public ?string $username  = null,
        #[ArrayOf(PhotoSize::class)]
        public ?array  $photo     = null,
        public array   $raw       = []
    )
    {
    }
}
