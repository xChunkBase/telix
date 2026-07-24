<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class UserProfileAudios
{
    public function __construct(
        public int   $totalCount,
        #[ArrayOf(Audio::class)]
        public array $audios,
        public array $raw        = []
    )
    {
    }
}
