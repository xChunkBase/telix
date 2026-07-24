<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class GiftBackground
{
    public function __construct(
        public int   $centerColor,
        public int   $edgeColor,
        public int   $textColor,
        public array $raw         = []
    )
    {
    }
}
