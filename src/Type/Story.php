<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Story
{
    public function __construct(
        public Chat  $chat,
        public int   $id,
        public array $raw  = []
    )
    {
    }
}
