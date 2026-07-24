<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageAutoDeleteTimerChanged
{
    public function __construct(
        public int   $messageAutoDeleteTime,
        public array $raw                   = []
    )
    {
    }
}
