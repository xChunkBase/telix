<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class UsersShared
{
    public function __construct(
        public int   $requestId,
        #[ArrayOf(SharedUser::class)]
        public array $users,
        public array $raw       = []
    )
    {
    }
}
