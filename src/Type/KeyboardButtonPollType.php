<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class KeyboardButtonPollType
{
    public function __construct(
        public ?string $type = null,
        public array   $raw  = []
    )
    {
    }
}
