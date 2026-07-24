<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class SwitchInlineQueryChosenChat
{
    public function __construct(
        public ?string $query             = null,
        public ?bool   $allowUserChats    = null,
        public ?bool   $allowBotChats     = null,
        public ?bool   $allowGroupChats   = null,
        public ?bool   $allowChannelChats = null,
        public array   $raw               = []
    )
    {
    }
}
