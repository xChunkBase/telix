<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageOriginHiddenUser
{
    public function __construct(
        public string $type,
        public int    $date,
        public string $senderUserName,
        public array  $raw            = []
    )
    {
    }
}
