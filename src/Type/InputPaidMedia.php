<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputPaidMedia
{
    public function __construct(
        public string $type,
        public string $media,
        public array  $raw   = []
    )
    {
    }
}
