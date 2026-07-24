<?php
declare(strict_types=1);

namespace Telix\Update\Webhook;

use Telix\Exception\WebhookException;

final class SecretTokenValidator
{
    public static function validate(?string $expected, ?string $provided): void
    {
        if ($expected === null) {
            return;
        }

        if ($provided === null || !hash_equals($expected, $provided)) {
            throw new WebhookException('Invalid or missing webhook secret token.');
        }
    }
}
