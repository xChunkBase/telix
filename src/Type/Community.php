<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Community
{
    public function __construct(
        public int    $id,
        public string $name,
        public array  $raw  = []
    )
    {
    }
}
