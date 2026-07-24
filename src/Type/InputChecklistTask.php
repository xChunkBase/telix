<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputChecklistTask
{
    public function __construct(
        public int     $id,
        public string  $text,
        public ?string $parseMode    = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array  $textEntities = null,
        public array   $raw          = []
    )
    {
    }
}
