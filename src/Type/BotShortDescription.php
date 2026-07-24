<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BotShortDescription
{
    public function __construct(
        public string $shortDescription,
        public array  $raw              = []
    )
    {
    }
}
