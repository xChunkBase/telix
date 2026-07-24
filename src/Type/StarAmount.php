<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class StarAmount
{
    public function __construct(
        public int   $amount,
        public ?int  $nanostarAmount = null,
        public array $raw            = []
    )
    {
    }
}
