<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class CopyTextButton
{
    public function __construct(
        public string $text,
        public array  $raw  = []
    )
    {
    }
}
