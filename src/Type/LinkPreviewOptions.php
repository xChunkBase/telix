<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class LinkPreviewOptions
{
    public function __construct(
        public ?bool   $isDisabled       = null,
        public ?string $url              = null,
        public ?bool   $preferSmallMedia = null,
        public ?bool   $preferLargeMedia = null,
        public ?bool   $showAboveText    = null,
        public array   $raw              = []
    )
    {
    }
}
