<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class PaidMediaLivePhoto
{
    public function __construct(
        public string    $type,
        public LivePhoto $livePhoto,
        public array     $raw       = []
    )
    {
    }
}
