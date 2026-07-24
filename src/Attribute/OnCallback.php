<?php
declare(strict_types=1);

namespace Telix\Attribute;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final readonly class OnCallback
{
    public function __construct(
        public string $pattern,
        public int    $priority = 0
    )
    {
    }
}
