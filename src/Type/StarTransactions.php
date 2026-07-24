<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class StarTransactions
{
    public function __construct(
        #[ArrayOf(StarTransaction::class)]
        public array $transactions,
        public array $raw          = []
    )
    {
    }
}
