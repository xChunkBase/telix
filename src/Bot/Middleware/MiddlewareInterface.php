<?php
declare(strict_types=1);

namespace Telix\Bot\Middleware;

use Telix\Bot\Context;

interface MiddlewareInterface
{
    public function process(Context $ctx, \Closure $next): void;
}
