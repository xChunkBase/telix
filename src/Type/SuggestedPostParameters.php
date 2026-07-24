<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuggestedPostParameters
{
    public function __construct(
        public ?SuggestedPostPrice $price    = null,
        public ?int                $sendDate = null,
        public array               $raw      = []
    )
    {
    }
}
