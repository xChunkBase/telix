<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class KeyboardButtonRequestChat
{
    public function __construct(
        public int                      $requestId,
        public bool                     $chatIsChannel,
        public ?bool                    $chatIsForum             = null,
        public ?bool                    $chatHasUsername         = null,
        public ?bool                    $chatIsCreated           = null,
        public ?ChatAdministratorRights $userAdministratorRights = null,
        public ?ChatAdministratorRights $botAdministratorRights  = null,
        public ?bool                    $botIsMember             = null,
        public ?bool                    $requestTitle            = null,
        public ?bool                    $requestUsername         = null,
        public ?bool                    $requestPhoto            = null,
        public array                    $raw                     = []
    )
    {
    }
}
