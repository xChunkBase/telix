<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class DirectMessagesTopic
{
    public function __construct(
        public int   $topicId,
        public ?User $user    = null,
        public array $raw     = []
    )
    {
    }
}
