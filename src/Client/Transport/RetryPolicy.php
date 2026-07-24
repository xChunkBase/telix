<?php
declare(strict_types=1);

namespace Telix\Client\Transport;

use Telix\Exception\TransportException;
use Telix\Exception\TooManyRequestsException;

final readonly class RetryPolicy
{
    public function __construct(
        public int $maxAttempts = 3,
        public int $baseDelayMs = 300
    )
    {
    }

    public static function none(): self
    {
        return new self(maxAttempts: 1);
    }

    public function shouldRetry(\Throwable $exception, int $attempt): bool
    {
        if ($attempt >= $this->maxAttempts) {
            return false;
        }

        return $exception instanceof TransportException
            || $exception instanceof TooManyRequestsException;
    }

    public function delayMs(\Throwable $exception, int $attempt): int
    {
        if ($exception instanceof TooManyRequestsException && $exception->retryAfter !== null) {
            return $exception->retryAfter * 1000;
        }

        return (int) ($this->baseDelayMs * (2 ** ($attempt - 1))) + random_int(0, 100);
    }
}
