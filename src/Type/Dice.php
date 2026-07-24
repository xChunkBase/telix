<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Dice
{
    public function __construct(
        public string $emoji,
        public int    $value
    )
    {
    }
}
