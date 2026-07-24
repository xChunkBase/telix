<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BotName
{
    public function __construct(
        public string $name,
        public array  $raw  = []
    )
    {
    }
}
