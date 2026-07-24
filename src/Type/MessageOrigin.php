<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageOrigin
{
    public function __construct(
        public string $type,
        public int    $date,
        public array  $raw  = []
    )
    {
    }
}
