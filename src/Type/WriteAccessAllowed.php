<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class WriteAccessAllowed
{
    public function __construct(
        public ?bool   $fromRequest        = null,
        public ?string $webAppName         = null,
        public ?bool   $fromAttachmentMenu = null,
        public array   $raw                = []
    )
    {
    }
}
