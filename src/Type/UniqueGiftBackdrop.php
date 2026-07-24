<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class UniqueGiftBackdrop
{
    public function __construct(
        public string                   $name,
        public UniqueGiftBackdropColors $colors,
        public int                      $rarityPerMille,
        public array                    $raw            = []
    )
    {
    }
}
