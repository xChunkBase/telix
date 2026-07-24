<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockAnimation
{
    public function __construct(
        public string            $type,
        public Animation         $animation,
        public ?bool             $hasSpoiler = null,
        public ?RichBlockCaption $caption    = null,
        public array             $raw        = []
    )
    {
    }
}
