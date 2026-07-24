<?php
declare(strict_types=1);

namespace Telix\Broadcast;

final readonly class BroadcastReport
{
    public function __construct(
        public int $sent,
        public int $blocked,
        public int $failed,
        public int $skipped = 0
    )
    {
    }

    public function total(): int
    {
        return $this->sent + $this->blocked + $this->failed + $this->skipped;
    }

    public function summary(): string
    {
        return sprintf(
            '%d sent, %d blocked the bot, %d failed%s',
            $this->sent,
            $this->blocked,
            $this->failed,
            $this->skipped > 0 ? ", {$this->skipped} skipped (resume)" : ''
        );
    }
}
