<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class BusinessOpeningHours
{
    public function __construct(
        public string $timeZoneName,
        #[ArrayOf(BusinessOpeningHoursInterval::class)]
        public array  $openingHours,
        public array  $raw          = []
    )
    {
    }
}
