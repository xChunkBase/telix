<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuggestedPostApproved
{
    public function __construct(
        public int                 $sendDate,
        public ?Message            $suggestedPostMessage = null,
        public ?SuggestedPostPrice $price                = null,
        public array               $raw                  = []
    )
    {
    }
}
