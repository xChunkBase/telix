<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class UniqueGiftModel
{
    public function __construct(
        public string  $name,
        public Sticker $sticker,
        public int     $rarityPerMille,
        public ?string $rarity         = null,
        public array   $raw            = []
    )
    {
    }
}
