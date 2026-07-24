<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class KeyboardButton
{
    public function __construct(
        public string                           $text,
        public ?string                          $iconCustomEmojiId = null,
        public ?string                          $style             = null,
        public ?KeyboardButtonRequestUsers      $requestUsers      = null,
        public ?KeyboardButtonRequestChat       $requestChat       = null,
        public ?KeyboardButtonRequestManagedBot $requestManagedBot = null,
        public ?bool                            $requestContact    = null,
        public ?bool                            $requestLocation   = null,
        public ?KeyboardButtonPollType          $requestPoll       = null,
        public ?WebAppInfo                      $webApp            = null,
        public array                            $raw               = []
    )
    {
    }
}
