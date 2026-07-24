<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CreateChatSubscriptionInviteLink
{
    public function createChatSubscriptionInviteLink(
        int|string $chatId,
        int        $subscriptionPeriod,
        int        $subscriptionPrice,
        ?string    $name               = null
    ): \Telix\Type\ChatInviteLink
    {
        return $this->call(new RawMethod('createChatSubscriptionInviteLink', [
            'chat_id'             => $chatId,
            'subscription_period' => $subscriptionPeriod,
            'subscription_price'  => $subscriptionPrice,
            'name'                => $name,
        ], ResponseMap::of('createChatSubscriptionInviteLink')));
    }
}
