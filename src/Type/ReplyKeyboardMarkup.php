<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ReplyKeyboardMarkup
{
    public function __construct(
        public array   $keyboard,
        public ?bool   $isPersistent          = null,
        public ?bool   $resizeKeyboard        = null,
        public ?bool   $oneTimeKeyboard       = null,
        public ?string $inputFieldPlaceholder = null,
        public ?bool   $selective             = null,
        public array   $raw                   = []
    )
    {
    }
}
