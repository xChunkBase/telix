<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SetWebhook
{
    public function setWebhook(
        string                            $url,
        \Telix\Type\InputFile|string|null $certificate        = null,
        ?string                           $ipAddress          = null,
        ?int                              $maxConnections     = null,
        ?array                            $allowedUpdates     = null,
        ?bool                             $dropPendingUpdates = null,
        ?string                           $secretToken        = null
    ): bool
    {
        return $this->call(new RawMethod('setWebhook', [
            'url'                  => $url,
            'certificate'          => $certificate,
            'ip_address'           => $ipAddress,
            'max_connections'      => $maxConnections,
            'allowed_updates'      => $allowedUpdates,
            'drop_pending_updates' => $dropPendingUpdates,
            'secret_token'         => $secretToken,
        ], ResponseMap::of('setWebhook')));
    }
}
