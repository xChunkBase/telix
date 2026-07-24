<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PreparedInlineMessage
{
    public function __construct(
        public string $id,
        public int    $expirationDate,
        public array  $raw            = []
    )
    {
    }
}
