<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChosenInlineResult
{
    public function __construct(
        public string  $resultId,
        public User    $from,
        public string  $query,
        public ?string $inlineMessageId = null
    )
    {
    }
}
