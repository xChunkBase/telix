<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuggestedPostRefunded
{
    public function __construct(
        public string   $reason,
        public ?Message $suggestedPostMessage = null,
        public array    $raw                  = []
    )
    {
    }
}
