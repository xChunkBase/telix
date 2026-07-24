<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ProximityAlertTriggered
{
    public function __construct(
        public User  $traveler,
        public User  $watcher,
        public int   $distance,
        public array $raw      = []
    )
    {
    }
}
