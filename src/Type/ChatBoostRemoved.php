<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatBoostRemoved
{
    public function __construct(
        public Chat   $chat,
        public string $boostId,
        public int    $removeDate,
        public array  $source     = []
    )
    {
    }
}
