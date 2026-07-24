<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class UserRating
{
    public function __construct(
        public int   $level,
        public int   $rating,
        public int   $currentLevelRating,
        public ?int  $nextLevelRating    = null,
        public array $raw                = []
    )
    {
    }
}
