<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MenuButtonWebApp
{
    public function __construct(
        public string     $type,
        public string     $text,
        public WebAppInfo $webApp,
        public array      $raw    = []
    )
    {
    }
}
