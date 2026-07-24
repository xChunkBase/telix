<?php
declare(strict_types=1);

namespace Telix\Form;

use Telix\Bot\Context;

final class Expect
{
    private function __construct(
        private readonly \Closure $extract,
        private readonly string   $error
    )
    {
    }

    public function attempt(Context $ctx): array
    {
        return ($this->extract)($ctx);
    }

    public function errorMessage(): string
    {
        return $this->error;
    }

    public function check(callable $predicate, ?string $error = null): self
    {
        $previous = $this->extract;

        return new self(static function (Context $ctx) use ($previous, $predicate): array {
            [$valid, $value] = $previous($ctx);

            return $valid && $predicate($value, $ctx) ? [true, $value] : [false, null];
        }, $error ?? $this->error);
    }

    public static function text(int $min = 1, int $max = 4096, ?string $error = null): self
    {
        return new self(static function (Context $ctx) use ($min, $max): array {
            $text   = $ctx->text();
            $length = $text === null ? -1 : mb_strlen($text);

            return $length >= $min && $length <= $max ? [true, $text] : [false, null];
        }, $error ?? 'Please send a text answer.');
    }

    public static function regex(string $pattern, ?string $error = null): self
    {
        return new self(static function (Context $ctx) use ($pattern): array {
            $text = $ctx->text();

            return $text !== null && $pattern !== '' && preg_match($pattern, $text) === 1 ? [true, $text] : [false, null];
        }, $error ?? 'That answer is not in the expected format.');
    }

    public static function int(?int $min = null, ?int $max = null, ?string $error = null): self
    {
        return new self(static function (Context $ctx) use ($min, $max): array {
            $text = $ctx->text();

            if ($text === null) {
                return [false, null];
            }

            $text = strtr(trim($text), [
                '۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4',
                '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9',
                '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4',
                '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9',
                ',' => '', '٬' => '',
            ]);

            if (preg_match('/^-?\d{1,18}$/', $text) !== 1) {
                return [false, null];
            }

            $value = (int) $text;

            if (($min !== null && $value < $min) || ($max !== null && $value > $max)) {
                return [false, null];
            }

            return [true, $value];
        }, $error ?? 'Please send a number.');
    }

    public static function oneOf(array $options, ?string $error = null): self
    {
        return new self(static function (Context $ctx) use ($options): array {
            $text = $ctx->text();

            return $text !== null && \in_array($text, $options, true) ? [true, $text] : [false, null];
        }, $error ?? 'Please pick one of the offered options.');
    }

    public static function photo(?string $error = null): self
    {
        return self::field(static fn (Context $ctx): mixed => $ctx->update->message?->largestPhoto(), $error ?? 'Please send a photo.');
    }

    public static function document(?string $error = null): self
    {
        return self::field(static fn (Context $ctx): mixed => $ctx->update->message?->document, $error ?? 'Please send a file.');
    }

    public static function voice(?string $error = null): self
    {
        return self::field(static fn (Context $ctx): mixed => $ctx->update->message?->voice, $error ?? 'Please send a voice message.');
    }

    public static function contact(?string $error = null): self
    {
        return self::field(static fn (Context $ctx): mixed => $ctx->update->message?->contact, $error ?? 'Please share a contact.');
    }

    public static function location(?string $error = null): self
    {
        return self::field(static fn (Context $ctx): mixed => $ctx->update->message?->location, $error ?? 'Please share a location.');
    }

    public static function that(callable $extractor, string $error): self
    {
        return self::field($extractor(...), $error);
    }

    private static function field(\Closure $extractor, string $error): self
    {
        return new self(static function (Context $ctx) use ($extractor): array {
            $value = $extractor($ctx);

            return $value === null ? [false, null] : [true, $value];
        }, $error);
    }
}
