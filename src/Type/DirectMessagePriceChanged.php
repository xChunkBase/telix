<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class DirectMessagePriceChanged
{
    public function __construct(
        public bool  $areDirectMessagesEnabled,
        public ?int  $directMessageStarCount   = null,
        public array $raw                      = []
    )
    {
    }
}
