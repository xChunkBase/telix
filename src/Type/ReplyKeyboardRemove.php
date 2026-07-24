<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ReplyKeyboardRemove
{
    public function __construct(
        public bool  $removeKeyboard,
        public ?bool $selective      = null,
        public array $raw            = []
    )
    {
    }
}
