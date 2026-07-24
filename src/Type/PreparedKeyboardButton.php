<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PreparedKeyboardButton
{
    public function __construct(
        public string $id,
        public array  $raw = []
    )
    {
    }
}
