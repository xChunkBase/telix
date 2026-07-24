<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class ReplyParameters
{
    public function __construct(
        public ?int            $messageId                = null,
        public int|string|null $chatId                   = null,
        public ?int            $ephemeralMessageId       = null,
        public ?bool           $allowSendingWithoutReply = null,
        public ?string         $quote                    = null,
        public ?string         $quoteParseMode           = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array          $quoteEntities            = null,
        public ?int            $quotePosition            = null,
        public ?int            $checklistTaskId          = null,
        public ?string         $pollOptionId             = null,
        public array           $raw                      = []
    )
    {
    }
}
