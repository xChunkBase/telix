<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class LoginUrl
{
    public function __construct(
        public string  $url,
        public ?string $forwardText        = null,
        public ?string $botUsername        = null,
        public ?bool   $requestWriteAccess = null,
        public array   $raw                = []
    )
    {
    }
}
