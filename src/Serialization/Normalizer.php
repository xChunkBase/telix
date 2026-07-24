<?php
declare(strict_types=1);

namespace Telix\Serialization;

use Telix\Type\InputFile;

final class Normalizer
{
    public static function payload(array $payload): array
    {
        $normalized = [];

        foreach ($payload as $key => $value) {
            if ($value === null) {
                continue;
            }

            $normalized[$key] = self::value($value);
        }

        return $normalized;
    }

    public static function value(mixed $value): mixed
    {
        if ($value instanceof InputFile) {
            return $value;
        }

        if ($value instanceof \BackedEnum) {
            return $value->value;
        }

        if ($value instanceof \JsonSerializable) {
            return self::value($value->jsonSerialize());
        }

        if (\is_array($value)) {
            $normalized = [];

            foreach ($value as $key => $item) {
                if ($item === null) {
                    continue;
                }

                $normalized[$key] = self::value($item);
            }

            return $normalized;
        }

        return $value;
    }
}
