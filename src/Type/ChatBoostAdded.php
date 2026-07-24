<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatBoostAdded
{
    public function __construct(
        public int   $boostCount,
        public array $raw        = []
    )
    {
    }
}
