<?php
declare(strict_types=1);

namespace Telix\Bot;

use Psr\Container\ContainerInterface;

final class HandlerInvoker
{
    public static function invoke(callable|string|array $handler, Context $ctx, ?ContainerInterface $container = null): mixed
    {
        $callable = self::resolve($handler, $container);

        return $callable(...self::arguments($callable, $ctx));
    }

    private static function resolve(callable|string|array $handler, ?ContainerInterface $container): callable
    {
        if (\is_callable($handler) && !\is_string($handler)) {
            return $handler;
        }

        if (\is_string($handler)) {
            if (\function_exists($handler)) {
                return $handler;
            }

            $instance = self::instantiate($handler, $container);

            if (!\is_callable($instance)) {
                throw new \InvalidArgumentException("Handler class {$handler} must define __invoke().");
            }

            return $instance;
        }

        [$classOrObject, $method] = $handler;
        $instance                 = \is_object($classOrObject) ? $classOrObject : self::instantiate($classOrObject, $container);

        return [$instance, $method];
    }

    private static function instantiate(string $class, ?ContainerInterface $container): object
    {
        if ($container !== null && $container->has($class)) {
            return $container->get($class);
        }

        if (!\class_exists($class)) {
            throw new \InvalidArgumentException("Handler class {$class} does not exist.");
        }

        return new $class();
    }

    private static function arguments(callable $callable, Context $ctx): array
    {
        $reflection = \is_array($callable)
            ? new \ReflectionMethod($callable[0], $callable[1])
            : new \ReflectionFunction($callable(...));

        $arguments = [];

        foreach ($reflection->getParameters() as $parameter) {
            $type = $parameter->getType();

            if ($type instanceof \ReflectionNamedType && $type->getName() === Context::class) {
                $arguments[] = $ctx;
                continue;
            }

            $value = $ctx->param($parameter->getName());

            if ($value === null) {
                $arguments[] = $parameter->isDefaultValueAvailable() ? $parameter->getDefaultValue() : null;
                continue;
            }

            if ($type instanceof \ReflectionNamedType && $type->isBuiltin()) {
                $value = match ($type->getName()) {
                    'int'    => (int) $value,
                    'float'  => (float) $value,
                    'bool'   => filter_var($value, \FILTER_VALIDATE_BOOL),
                    'string' => (string) $value,
                    default  => $value,
                };
            }

            $arguments[] = $value;
        }

        return $arguments;
    }
}
