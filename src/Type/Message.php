<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class Message
{
    public function __construct(
        public int                $messageId,
        public int                $date,
        public Chat               $chat,
        public ?User              $from                 = null,
        public ?string            $text                 = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array             $entities             = null,
        public ?string            $caption              = null,
        #[ArrayOf(PhotoSize::class)]
        public ?array             $photo                = null,
        public ?Document          $document             = null,
        public ?Video             $video                = null,
        public ?Audio             $audio                = null,
        public ?Voice             $voice                = null,
        public ?Contact           $contact              = null,
        public ?Location          $location             = null,
        public ?Message           $replyToMessage       = null,
        public ?User              $viaBot               = null,
        public ?int               $editDate             = null,
        public ?string            $mediaGroupId         = null,
        public ?int               $messageThreadId      = null,
        #[ArrayOf(User::class)]
        public ?array             $newChatMembers       = null,
        public ?User              $leftChatMember       = null,
        public ?Sticker           $sticker              = null,
        public ?Animation         $animation            = null,
        public ?VideoNote         $videoNote            = null,
        public ?Venue             $venue                = null,
        public ?Dice              $dice                 = null,
        public ?Poll              $poll                 = null,
        public ?Invoice           $invoice              = null,
        public ?SuccessfulPayment $successfulPayment    = null,
        public ?WebAppData        $webAppData           = null,
        public ?Message           $pinnedMessage        = null,
        public ?string            $newChatTitle         = null,
        public ?string            $businessConnectionId = null,
        public array              $raw                  = []
    )
    {
    }

    public function isCommand(): bool
    {
        return $this->commandName() !== null;
    }

    public function commandName(): ?string
    {
        if ($this->text === null || !preg_match('~^/([A-Za-z0-9_]+)(?:@\S+)?(?:\s|$)~', $this->text, $matches)) {
            return null;
        }

        return strtolower($matches[1]);
    }

    public function commandArgs(): ?string
    {
        if ($this->text === null || !preg_match('~^/[A-Za-z0-9_]+(?:@\S+)?\s+(.+)$~su', $this->text, $matches)) {
            return null;
        }

        return trim($matches[1]);
    }

    public function content(): ?string
    {
        return $this->text ?? $this->caption;
    }

    public function largestPhoto(): ?PhotoSize
    {
        if ($this->photo === null || $this->photo === []) {
            return null;
        }

        $largest = $this->photo[0];

        foreach ($this->photo as $size) {
            if ($size->width * $size->height > $largest->width * $largest->height) {
                $largest = $size;
            }
        }

        return $largest;
    }
}
