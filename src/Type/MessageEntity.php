<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageEntity
{
    public function __construct(
        public string  $type,
        public int     $offset,
        public int     $length,
        public ?string $url            = null,
        public ?User   $user           = null,
        public ?string $language       = null,
        public ?string $customEmojiId  = null,
        public ?int    $unixTime       = null,
        public ?string $dateTimeFormat = null,
        public array   $raw            = []
    )
    {
    }
}
