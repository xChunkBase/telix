<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichMessageMedia
{
    public function __construct(
        public string $id,
        public mixed  $media,
        public array  $raw   = []
    )
    {
    }
}
