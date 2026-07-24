<?php
declare(strict_types=1);

namespace Telix\Bot\Middleware;

use Telix\Bot\Context;

final class Pipeline
{
    /**
     * @param list<MiddlewareInterface> $middleware
     */
    public function __construct(
        private readonly array    $middleware,
        private readonly \Closure $core
    )
    {
    }

    public function run(Context $ctx): void
    {
        $next = $this->core;

        foreach (array_reverse($this->middleware) as $middleware) {
            $previous = $next;
            $next     = static function (Context $c) use ($middleware, $previous): void {
                $middleware->process($c, $previous);
            };
        }

        $next($ctx);
    }
}
