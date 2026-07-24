<?php
declare(strict_types=1);

namespace Telix\Attribute;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final readonly class OnCommand
{
    public function __construct(
        public string $command,
        public string $description = '',
        public int    $priority    = 0
    )
    {
    }
}
