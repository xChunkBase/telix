<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class TextQuote
{
    public function __construct(
        public string $text,
        public int    $position,
        #[ArrayOf(MessageEntity::class)]
        public ?array $entities = null,
        public ?bool  $isManual = null,
        public array  $raw      = []
    )
    {
    }
}
