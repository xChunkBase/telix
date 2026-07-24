<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatBoost
{
    public function __construct(
        public string          $boostId,
        public int             $addDate,
        public int             $expirationDate,
        public ChatBoostSource $source,
        public array           $raw            = []
    )
    {
    }
}
