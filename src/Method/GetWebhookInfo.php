<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait GetWebhookInfo
{
    public function getWebhookInfo(): \Telix\Type\WebhookInfo
    {
        return $this->call(new RawMethod('getWebhookInfo', [], ResponseMap::of('getWebhookInfo')));
    }
}
