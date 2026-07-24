<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockPreformatted
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public ?string  $language = null,
        public array    $raw      = []
    )
    {
    }
}
