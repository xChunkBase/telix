<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQueryResultsButton
{
    public function __construct(
        public string      $text,
        public ?WebAppInfo $webApp         = null,
        public ?string     $startParameter = null,
        public array       $raw            = []
    )
    {
    }
}
