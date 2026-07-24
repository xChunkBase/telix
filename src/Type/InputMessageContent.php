<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputMessageContent
{
    public function __construct(
        public array $raw = []
    )
    {
    }
}
