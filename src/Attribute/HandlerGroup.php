<?php
declare(strict_types=1);

namespace Telix\Attribute;

#[\Attribute(\Attribute::TARGET_CLASS)]
final readonly class HandlerGroup
{
    public function __construct(
        public ?string $callbackPrefix = null,
        public array   $middleware     = []
    )
    {
    }
}
