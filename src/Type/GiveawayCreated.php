<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class GiveawayCreated
{
    public function __construct(
        public ?int  $prizeStarCount = null,
        public array $raw            = []
    )
    {
    }
}
