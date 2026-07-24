<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PaidMediaVideo
{
    public function __construct(
        public string $type,
        public Video  $video,
        public array  $raw   = []
    )
    {
    }
}
