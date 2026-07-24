<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputStoryContentPhoto
{
    public function __construct(
        public string $type,
        public string $photo,
        public array  $raw   = []
    )
    {
    }
}
