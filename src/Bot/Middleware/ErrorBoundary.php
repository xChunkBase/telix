<?php
declare(strict_types=1);

namespace Telix\Bot\Middleware;

use Telix\Bot\Context;
use Psr\Log\NullLogger;
use Psr\Log\LoggerInterface;

final class ErrorBoundary implements MiddlewareInterface
{
    private readonly ?\Closure $onError;

    public function __construct(
        private readonly LoggerInterface $logger  = new NullLogger(),
        ?callable                        $onError = null
    )
    {
        $this->onError = $onError === null ? null : $onError(...);
    }

    public function process(Context $ctx, \Closure $next): void
    {
        try {
            $next($ctx);
        } catch (\Throwable $exception) {
            $this->logger->error('Handler failed for update {update_id}: {error}', [
                'update_id' => $ctx->update->updateId,
                'error'     => $exception->getMessage(),
                'exception' => $exception,
            ]);

            if ($this->onError !== null) {
                ($this->onError)($ctx, $exception);
            }
        }
    }
}
