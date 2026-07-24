<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BotDescription
{
    public function __construct(
        public string $description,
        public array  $raw         = []
    )
    {
    }
}
