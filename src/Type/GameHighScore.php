<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class GameHighScore
{
    public function __construct(
        public int   $position,
        public User  $user,
        public int   $score,
        public array $raw      = []
    )
    {
    }
}
