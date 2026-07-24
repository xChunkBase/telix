<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Link
{
    public function __construct(
        public string $url,
        public array  $raw = []
    )
    {
    }
}
