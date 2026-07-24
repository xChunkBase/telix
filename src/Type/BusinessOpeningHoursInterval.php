<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BusinessOpeningHoursInterval
{
    public function __construct(
        public int   $openingMinute,
        public int   $closingMinute,
        public array $raw           = []
    )
    {
    }
}
