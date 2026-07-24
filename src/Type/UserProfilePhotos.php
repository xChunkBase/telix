<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class UserProfilePhotos
{
    public function __construct(
        public int   $totalCount,
        public array $photos,
        public array $raw        = []
    )
    {
    }
}
