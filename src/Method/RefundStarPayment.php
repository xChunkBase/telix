<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait RefundStarPayment
{
    public function refundStarPayment(
        int    $userId,
        string $telegramPaymentChargeId
    ): bool
    {
        return $this->call(new RawMethod('refundStarPayment', [
            'user_id'                    => $userId,
            'telegram_payment_charge_id' => $telegramPaymentChargeId,
        ], ResponseMap::of('refundStarPayment')));
    }
}
