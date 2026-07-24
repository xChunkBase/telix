<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageOriginUser
{
    public function __construct(
        public string $type,
        public int    $date,
        public User   $senderUser,
        public array  $raw        = []
    )
    {
    }
}
