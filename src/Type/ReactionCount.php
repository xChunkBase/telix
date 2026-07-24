<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ReactionCount
{
    public function __construct(
        public ReactionType $type,
        public int          $totalCount,
        public array        $raw        = []
    )
    {
    }
}
