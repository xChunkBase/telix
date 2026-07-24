<?php
declare(strict_types=1);

namespace Telix\Attribute;

use Telix\Type\Enum\UpdateType;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final readonly class OnUpdate
{
    public function __construct(
        public UpdateType $type,
        public int        $priority = 0
    )
    {
    }
}
