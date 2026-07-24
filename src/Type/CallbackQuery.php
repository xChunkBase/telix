<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class CallbackQuery
{
    public function __construct(
        public string   $id,
        public User     $from,
        public string   $chatInstance,
        public ?Message $message         = null,
        public ?string  $inlineMessageId = null,
        public ?string  $data            = null,
        public ?string  $gameShortName   = null
    )
    {
    }
}
