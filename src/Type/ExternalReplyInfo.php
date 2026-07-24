<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class ExternalReplyInfo
{
    public function __construct(
        public MessageOrigin       $origin,
        public ?Chat               $chat               = null,
        public ?int                $messageId          = null,
        public ?LinkPreviewOptions $linkPreviewOptions = null,
        public ?Animation          $animation          = null,
        public ?Audio              $audio              = null,
        public ?Document           $document           = null,
        public ?LivePhoto          $livePhoto          = null,
        public ?PaidMediaInfo      $paidMedia          = null,
        #[ArrayOf(PhotoSize::class)]
        public ?array              $photo              = null,
        public ?Sticker            $sticker            = null,
        public ?Story              $story              = null,
        public ?Video              $video              = null,
        public ?VideoNote          $videoNote          = null,
        public ?Voice              $voice              = null,
        public ?bool               $hasMediaSpoiler    = null,
        public ?Checklist          $checklist          = null,
        public ?Contact            $contact            = null,
        public ?Dice               $dice               = null,
        public ?Game               $game               = null,
        public ?Giveaway           $giveaway           = null,
        public ?GiveawayWinners    $giveawayWinners    = null,
        public ?Invoice            $invoice            = null,
        public ?Location           $location           = null,
        public ?Poll               $poll               = null,
        public ?Venue              $venue              = null,
        public array               $raw                = []
    )
    {
    }
}
