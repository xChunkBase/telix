<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SentWebAppMessage
{
    public function __construct(
        public ?string $inlineMessageId = null,
        public array   $raw             = []
    )
    {
    }
}
