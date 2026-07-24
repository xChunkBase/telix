<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BackgroundTypeWallpaper
{
    public function __construct(
        public string   $type,
        public Document $document,
        public int      $darkThemeDimming,
        public ?bool    $isBlurred        = null,
        public ?bool    $isMoving         = null,
        public array    $raw              = []
    )
    {
    }
}
