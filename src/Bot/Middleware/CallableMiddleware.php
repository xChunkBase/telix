<?php
declare(strict_types=1);

namespace Telix\Bot\Middleware;

use Telix\Bot\Context;

final class CallableMiddleware implements MiddlewareInterface
{
    private readonly \Closure $middleware;

    public function __construct(callable $middleware)
    {
        $this->middleware = $middleware(...);
    }

    public function process(Context $ctx, \Closure $next): void
    {
        ($this->middleware)($ctx, $next);
    }
}
