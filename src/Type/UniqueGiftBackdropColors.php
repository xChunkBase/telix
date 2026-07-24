<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class UniqueGiftBackdropColors
{
    public function __construct(
        public int   $centerColor,
        public int   $edgeColor,
        public int   $symbolColor,
        public int   $textColor,
        public array $raw         = []
    )
    {
    }
}
