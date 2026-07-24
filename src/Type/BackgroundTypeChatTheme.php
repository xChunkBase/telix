<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BackgroundTypeChatTheme
{
    public function __construct(
        public string $type,
        public string $themeName,
        public array  $raw       = []
    )
    {
    }
}
