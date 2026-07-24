<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuggestedPostPaid
{
    public function __construct(
        public string      $currency,
        public ?Message    $suggestedPostMessage = null,
        public ?int        $amount               = null,
        public ?StarAmount $starAmount           = null,
        public array       $raw                  = []
    )
    {
    }
}
