<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class VideoChatScheduled
{
    public function __construct(
        public int   $startDate,
        public array $raw       = []
    )
    {
    }
}
