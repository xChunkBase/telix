<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuggestedPostInfo
{
    public function __construct(
        public string              $state,
        public ?SuggestedPostPrice $price    = null,
        public ?int                $sendDate = null,
        public array               $raw      = []
    )
    {
    }
}
