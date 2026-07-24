<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputProfilePhotoAnimated
{
    public function __construct(
        public string $type,
        public string $animation,
        public ?float $mainFrameTimestamp = null,
        public array  $raw                = []
    )
    {
    }
}
