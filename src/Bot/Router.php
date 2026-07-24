<?php
declare(strict_types=1);

namespace Telix\Bot;

use Telix\Bot\Filter\Filter;
use Telix\Bot\Middleware\Pipeline;
use Psr\Container\ContainerInterface;
use Telix\Bot\Middleware\CallableMiddleware;
use Telix\Bot\Middleware\MiddlewareInterface;

final class Router
{
    private array $routes   = [];
    private mixed $fallback = null;
    private bool $sorted    = true;
    private int $order      = 0;

    public function __construct(
        private readonly ?ContainerInterface $container = null
    )
    {
    }

    public function add(Filter $filter, callable|string|array $handler, int $priority = 0, array $middleware = []): void
    {
        $this->routes[] = [
            'filter'     => $filter,
            'handler'    => $handler,
            'priority'   => $priority,
            'middleware' => $middleware,
            'order'      => $this->order++,
        ];
        $this->sorted = false;
    }

    public function fallback(callable|string|array $handler): void
    {
        $this->fallback = $handler;
    }

    public function dispatch(Context $ctx): bool
    {
        if (!$this->sorted) {
            usort(
                $this->routes,
                static fn (array $a, array $b): int => [$b['priority'], $a['order']] <=> [$a['priority'], $b['order']]
            );
            $this->sorted = true;
        }

        foreach ($this->routes as $route) {
            if (!$route['filter']->matches($ctx)) {
                continue;
            }

            $this->runThroughMiddleware($route['middleware'], $route['handler'], $ctx);

            return true;
        }

        if ($this->fallback !== null) {
            HandlerInvoker::invoke($this->fallback, $ctx, $this->container);

            return true;
        }

        return false;
    }

    private function runThroughMiddleware(array $middleware, callable|string|array $handler, Context $ctx): void
    {
        $core = fn (Context $c): mixed => HandlerInvoker::invoke($handler, $c, $this->container);

        if ($middleware === []) {
            $core($ctx);

            return;
        }

        (new Pipeline(array_values(array_map($this->toMiddleware(...), $middleware)), $core))->run($ctx);
    }

    private function toMiddleware(MiddlewareInterface|callable|string $middleware): MiddlewareInterface
    {
        if ($middleware instanceof MiddlewareInterface) {
            return $middleware;
        }

        if (\is_string($middleware) && class_exists($middleware)) {
            $instance = ($this->container !== null && $this->container->has($middleware))
                ? $this->container->get($middleware)
                : new $middleware();

            if (!$instance instanceof MiddlewareInterface) {
                throw new \InvalidArgumentException("{$middleware} does not implement MiddlewareInterface.");
            }

            return $instance;
        }

        if (\is_callable($middleware)) {
            return new CallableMiddleware($middleware);
        }

        throw new \InvalidArgumentException('Middleware must be a MiddlewareInterface, a callable, or a class-string that implements MiddlewareInterface.');
    }
}
