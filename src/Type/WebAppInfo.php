<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class WebAppInfo
{
    public function __construct(
        public string $url,
        public array  $raw = []
    )
    {
    }
}
