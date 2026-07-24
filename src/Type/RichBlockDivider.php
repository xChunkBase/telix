<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockDivider
{
    public function __construct(
        public string $type,
        public array  $raw  = []
    )
    {
    }
}
