<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQuery
{
    public function __construct(
        public string  $id,
        public User    $from,
        public string  $query,
        public string  $offset,
        public ?string $chatType = null
    )
    {
    }
}
