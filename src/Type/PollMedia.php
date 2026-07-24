<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class PollMedia
{
    public function __construct(
        public ?Animation $animation = null,
        public ?Audio     $audio     = null,
        public ?Document  $document  = null,
        public ?Link      $link      = null,
        public ?LivePhoto $livePhoto = null,
        public ?Location  $location  = null,
        #[ArrayOf(PhotoSize::class)]
        public ?array     $photo     = null,
        public ?Sticker   $sticker   = null,
        public ?Venue     $venue     = null,
        public ?Video     $video     = null,
        public array      $raw       = []
    )
    {
    }
}
