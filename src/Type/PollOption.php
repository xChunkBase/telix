<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PollOption
{
    public function __construct(
        public string $text,
        public int    $voterCount
    )
    {
    }
}
