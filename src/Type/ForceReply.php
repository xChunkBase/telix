<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ForceReply
{
    public function __construct(
        public bool    $forceReply,
        public ?string $inputFieldPlaceholder = null,
        public ?bool   $selective             = null,
        public array   $raw                   = []
    )
    {
    }
}
