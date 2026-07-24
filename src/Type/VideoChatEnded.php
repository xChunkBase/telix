<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class VideoChatEnded
{
    public function __construct(
        public int   $duration,
        public array $raw      = []
    )
    {
    }
}
