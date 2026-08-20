<?php
declare(strict_types=1);

namespace Telix\Client;

final readonly class Progress
{
    public function __construct(
        public Direction $direction,
        public int       $sent,
        public int       $total
    )
    {
    }

    public function percent(): int
    {
        return $this->total > 0 ? (int) floor($this->sent / $this->total * 100) : 0;
    }

    public function ratio(): float
    {
        return $this->total > 0 ? $this->sent / $this->total : 0.0;
    }
}
