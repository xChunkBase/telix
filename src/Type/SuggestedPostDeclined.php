<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SuggestedPostDeclined
{
    public function __construct(
        public ?Message $suggestedPostMessage = null,
        public ?string  $comment              = null,
        public array    $raw                  = []
    )
    {
    }
}
