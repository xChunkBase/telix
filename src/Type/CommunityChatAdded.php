<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class CommunityChatAdded
{
    public function __construct(
        public Community $community,
        public array     $raw       = []
    )
    {
    }
}
