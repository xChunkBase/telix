<?php
declare(strict_types=1);

namespace Telix\Serialization;

#[\Attribute(\Attribute::TARGET_PARAMETER)]
final readonly class ArrayOf
{
    public function __construct(public string $class)
    {
    }
}
