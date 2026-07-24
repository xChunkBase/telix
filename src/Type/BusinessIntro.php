<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BusinessIntro
{
    public function __construct(
        public ?string  $title   = null,
        public ?string  $message = null,
        public ?Sticker $sticker = null,
        public array    $raw     = []
    )
    {
    }
}
