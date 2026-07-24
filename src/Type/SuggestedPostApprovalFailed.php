<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuggestedPostApprovalFailed
{
    public function __construct(
        public SuggestedPostPrice $price,
        public ?Message           $suggestedPostMessage = null,
        public array              $raw                  = []
    )
    {
    }
}
