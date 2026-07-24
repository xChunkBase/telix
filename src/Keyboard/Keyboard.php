<?php
declare(strict_types=1);

namespace Telix\Keyboard;

final class Keyboard
{
    public static function from(array $rows): InlineKeyboard|ReplyKeyboard
    {
        $normalized = [];
        $inline     = false;

        foreach ($rows as $row) {
            $row          = \is_array($row) ? $row : [$row];
            $normalized[] = $row;

            foreach ($row as $key => $value) {
                if (\is_string($key) || $value instanceof Button) {
                    $inline = true;
                }
            }
        }

        return $inline ? self::inline($normalized) : self::reply($normalized);
    }

    public static function convertible(mixed $markup): bool
    {
        return \is_array($markup) && $markup !== [] && array_is_list($markup);
    }

    private static function inline(array $rows): InlineKeyboard
    {
        $keyboard = InlineKeyboard::make();

        foreach ($rows as $row) {
            $buttons = [];

            foreach ($row as $label => $value) {
                if ($value instanceof Button) {
                    $buttons[] = $value;
                    continue;
                }

                $label = \is_string($label) ? $label : (string) $value;
                $value = (string) $value;

                $buttons[] = str_starts_with($value, 'https://') || str_starts_with($value, 'http://')
                    ? Button::url($label, $value)
                    : Button::callback($label, $value);
            }

            $keyboard->row(...$buttons);
        }

        return $keyboard;
    }

    private static function reply(array $rows): ReplyKeyboard
    {
        $keyboard = ReplyKeyboard::make();

        foreach ($rows as $row) {
            $cells = \is_array($row) ? array_values($row) : [$row];

            $buttons = array_map(
                static function (mixed $button): KeyboardButton|string {
                    if ($button instanceof KeyboardButton) {
                        return $button;
                    }

                    return \is_scalar($button) ? (string) $button : '';
                },
                $cells
            );

            $keyboard->row(...$buttons);
        }

        return $keyboard->resize();
    }
}
