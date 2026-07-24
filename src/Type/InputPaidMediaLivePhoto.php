<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputPaidMediaLivePhoto
{
    public function __construct(
        public string $type,
        public string $media,
        public string $photo,
        public array  $raw   = []
    )
    {
    }
}
