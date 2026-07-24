<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BackgroundTypePattern
{
    public function __construct(
        public string         $type,
        public Document       $document,
        public BackgroundFill $fill,
        public int            $intensity,
        public ?bool          $isInverted = null,
        public ?bool          $isMoving   = null,
        public array          $raw        = []
    )
    {
    }
}
