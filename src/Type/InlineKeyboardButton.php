<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InlineKeyboardButton
{
    public function __construct(
        public string                       $text,
        public ?string                      $iconCustomEmojiId            = null,
        public ?string                      $style                        = null,
        public ?string                      $url                          = null,
        public ?string                      $callbackData                 = null,
        public ?WebAppInfo                  $webApp                       = null,
        public ?LoginUrl                    $loginUrl                     = null,
        public ?string                      $switchInlineQuery            = null,
        public ?string                      $switchInlineQueryCurrentChat = null,
        public ?SwitchInlineQueryChosenChat $switchInlineQueryChosenChat  = null,
        public ?CopyTextButton              $copyText                     = null,
        public ?CallbackGame                $callbackGame                 = null,
        public ?bool                        $pay                          = null,
        public array                        $raw                          = []
    )
    {
    }
}
