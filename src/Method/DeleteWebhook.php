<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait DeleteWebhook
{
    public function deleteWebhook(?bool $dropPendingUpdates = null): bool
    {
        return $this->call(new RawMethod('deleteWebhook', [
            'drop_pending_updates' => $dropPendingUpdates,
        ], ResponseMap::of('deleteWebhook')));
    }
}
