<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class WebhookInfo
{
    public function __construct(
        public string  $url,
        public bool    $hasCustomCertificate,
        public int     $pendingUpdateCount,
        public ?string $ipAddress                    = null,
        public ?int    $lastErrorDate                = null,
        public ?string $lastErrorMessage             = null,
        public ?int    $lastSynchronizationErrorDate = null,
        public ?int    $maxConnections               = null,
        public ?array  $allowedUpdates               = null
    )
    {
    }

    public function isSet(): bool
    {
        return $this->url !== '';
    }
}
