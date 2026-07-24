<?php
declare(strict_types=1);

namespace Telix\Serialization;

use Telix\Exception\SerializationException;

final class Hydrator
{
    private static array $metadata = [];

    public static function hydrate(string $type, mixed $data): mixed
    {
        if (str_ends_with($type, '[]')) {
            if (!\is_array($data)) {
                throw new SerializationException(sprintf('Expected array for %s, got %s.', $type, get_debug_type($data)));
            }

            $inner = substr($type, 0, -2);

            return array_map(static fn (mixed $item): mixed => self::hydrate($inner, $item), $data);
        }

        return match ($type) {
            'mixed'  => $data,
            'bool'   => \is_bool($data) ? $data : (bool) $data,
            'int'    => (int) $data,
            'float'  => (float) $data,
            'string' => (string) $data,
            default  => self::object($type, $data),
        };
    }

    private static function object(string $class, mixed $data): mixed
    {
        if (\is_bool($data) || $data === null) {
            return $data;
        }

        if ($data instanceof $class) {
            return $data;
        }

        if (!\is_array($data)) {
            throw new SerializationException(sprintf('Cannot hydrate %s from %s.', $class, get_debug_type($data)));
        }

        $arguments = [];

        foreach (self::$metadata[$class] ??= self::inspect($class) as $parameter) {
            if ($parameter['isRaw']) {
                $arguments[] = $data;
                continue;
            }

            $arguments[] = self::convert($data[$parameter['key']] ?? null, $parameter, $class);
        }

        if (!class_exists($class)) {
            throw new SerializationException(sprintf('Cannot hydrate unknown class %s.', $class));
        }

        return new $class(...$arguments);
    }

    private static function convert(mixed $value, array $parameter, string $class): mixed
    {
        if ($value === null) {
            if ($parameter['hasDefault']) {
                return $parameter['default'];
            }

            if ($parameter['nullable']) {
                return null;
            }

            throw new SerializationException(sprintf('Missing required field "%s" while hydrating %s.', $parameter['key'], $class));
        }

        if ($parameter['arrayOf'] !== null) {
            if (!\is_array($value)) {
                throw new SerializationException(sprintf('Field "%s" of %s must be an array.', $parameter['key'], $class));
            }

            return array_map(
                static fn (mixed $item): mixed => self::hydrate($parameter['arrayOf'], $item),
                $value
            );
        }

        $type = $parameter['type'];

        if (!\is_string($type)) {
            return $value;
        }

        if ($parameter['builtin']) {
            return match ($type) {
                'int'    => (int) $value,
                'float'  => (float) $value,
                'string' => (string) $value,
                'bool'   => (bool) $value,
                'array'  => (array) $value,
                default  => $value,
            };
        }

        if (is_subclass_of($type, \BackedEnum::class)) {
            return self::enum($type, $value);
        }

        return self::object($type, $value);
    }

    /**
     * @param class-string<\BackedEnum> $enum
     */
    private static function enum(string $enum, mixed $value): \BackedEnum
    {
        $case = \is_int($value) || \is_string($value) ? $enum::tryFrom($value) : null;

        if ($case !== null) {
            return $case;
        }

        foreach ($enum::cases() as $candidate) {
            if ($candidate->name === 'Unknown') {
                return $candidate;
            }
        }

        throw new SerializationException(sprintf('Value "%s" is not a valid case of %s.', \is_scalar($value) ? (string) $value : get_debug_type($value), $enum));
    }

    private static function inspect(string $class): array
    {
        if (!class_exists($class)) {
            throw new SerializationException(sprintf('Cannot hydrate unknown class %s.', $class));
        }

        $constructor = (new \ReflectionClass($class))->getConstructor();

        if ($constructor === null) {
            return [];
        }

        $metadata = [];

        foreach ($constructor->getParameters() as $parameter) {
            $type     = $parameter->getType();
            $typeName = $type instanceof \ReflectionNamedType ? $type->getName() : null;

            $arrayOf = null;

            foreach ($parameter->getAttributes(ArrayOf::class) as $attribute) {
                $arrayOf = $attribute->newInstance()->class;
            }

            $metadata[] = [
                'name'       => $parameter->getName(),
                'key'        => self::snake($parameter->getName()),
                'type'       => $typeName,
                'builtin'    => $type instanceof \ReflectionNamedType && $type->isBuiltin(),
                'arrayOf'    => $arrayOf,
                'nullable'   => $type === null || $type->allowsNull(),
                'hasDefault' => $parameter->isDefaultValueAvailable(),
                'default'    => $parameter->isDefaultValueAvailable() ? $parameter->getDefaultValue() : null,
                'isRaw'      => $parameter->getName() === 'raw' && $typeName === 'array',
            ];
        }

        return $metadata;
    }

    private static function snake(string $name): string
    {
        return strtolower((string) preg_replace('/[A-Z]/', '_$0', $name));
    }
}
