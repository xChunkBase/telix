<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait EditUserStarSubscription
{
    public function editUserStarSubscription(
        int    $userId,
        string $telegramPaymentChargeId,
        bool   $isCanceled
    ): bool
    {
        return $this->call(new RawMethod('editUserStarSubscription', [
            'user_id'                    => $userId,
            'telegram_payment_charge_id' => $telegramPaymentChargeId,
            'is_canceled'                => $isCanceled,
        ], ResponseMap::of('editUserStarSubscription')));
    }
}
