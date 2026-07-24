<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Birthdate
{
    public function __construct(
        public int   $day,
        public int   $month,
        public ?int  $year  = null,
        public array $raw   = []
    )
    {
    }
}
