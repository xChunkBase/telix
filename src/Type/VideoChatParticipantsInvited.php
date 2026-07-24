<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class VideoChatParticipantsInvited
{
    public function __construct(
        #[ArrayOf(User::class)]
        public array $users,
        public array $raw   = []
    )
    {
    }
}
