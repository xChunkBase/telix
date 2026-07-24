<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageOriginChannel
{
    public function __construct(
        public string  $type,
        public int     $date,
        public Chat    $chat,
        public int     $messageId,
        public ?string $authorSignature = null,
        public array   $raw             = []
    )
    {
    }
}
