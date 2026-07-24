<?php
declare(strict_types=1);

namespace Telix\Attribute;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final readonly class OnText
{
    public function __construct(
        public ?string $regex    = null,
        public ?string $exact    = null,
        public ?string $contains = null,
        public int     $priority = 0
    )
    {
    }
}
