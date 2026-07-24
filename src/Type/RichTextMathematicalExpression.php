<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextMathematicalExpression
{
    public function __construct(
        public string $type,
        public string $expression,
        public array  $raw        = []
    )
    {
    }
}
