<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockMap
{
    public function __construct(
        public string            $type,
        public Location          $location,
        public int               $zoom,
        public int               $width,
        public int               $height,
        public ?RichBlockCaption $caption  = null,
        public array             $raw      = []
    )
    {
    }
}
