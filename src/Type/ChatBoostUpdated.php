<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatBoostUpdated
{
    public function __construct(
        public Chat      $chat,
        public ChatBoost $boost,
        public array     $raw   = []
    )
    {
    }
}
