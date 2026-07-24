<?php
declare(strict_types=1);

namespace Telix\Bot\Middleware;

use Telix\Bot\Context;
use Psr\Log\LoggerInterface;

final class LoggingMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly LoggerInterface $logger
    )
    {
    }

    public function process(Context $ctx, \Closure $next): void
    {
        $start = hrtime(true);
        $next($ctx);

        $this->logger->info('Update {update_id} ({type}) from {user} handled in {ms}ms', [
            'update_id' => $ctx->update->updateId,
            'type'      => $ctx->update->type()->value,
            'user'      => $ctx->from()?->id ?? 'n/a',
            'ms'        => (int) ((hrtime(true) - $start) / 1_000_000),
        ]);
    }
}
