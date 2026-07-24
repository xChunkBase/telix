<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineQueryResultLocation
{
    public function __construct(
        public string                $type,
        public string                $id,
        public float                 $latitude,
        public float                 $longitude,
        public string                $title,
        public ?float                $horizontalAccuracy   = null,
        public ?int                  $livePeriod           = null,
        public ?int                  $heading              = null,
        public ?int                  $proximityAlertRadius = null,
        public ?InlineKeyboardMarkup $replyMarkup          = null,
        public ?InputMessageContent  $inputMessageContent  = null,
        public ?string               $thumbnailUrl         = null,
        public ?int                  $thumbnailWidth       = null,
        public ?int                  $thumbnailHeight      = null,
        public array                 $raw                  = []
    )
    {
    }
}
