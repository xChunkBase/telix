<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageOriginChat
{
    public function __construct(
        public string  $type,
        public int     $date,
        public Chat    $senderChat,
        public ?string $authorSignature = null,
        public array   $raw             = []
    )
    {
    }
}
