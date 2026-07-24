<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichBlockMathematicalExpression
{
    public function __construct(
        public string $type,
        public string $expression,
        public array  $raw        = []
    )
    {
    }
}
