<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class WebAppData
{
    public function __construct(
        public string $data,
        public string $buttonText,
        public array  $raw        = []
    )
    {
    }
}
