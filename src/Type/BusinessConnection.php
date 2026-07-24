<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BusinessConnection
{
    public function __construct(
        public string             $id,
        public User               $user,
        public int                $userChatId,
        public int                $date,
        public bool               $isEnabled,
        public ?BusinessBotRights $rights     = null,
        public array              $raw        = []
    )
    {
    }
}
