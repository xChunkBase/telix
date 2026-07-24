<?php
declare(strict_types=1);

namespace Telix\Keyboard;

final class ReplyKeyboard implements \JsonSerializable
{
    private array $rows                    = [];
    private bool $resizeKeyboard           = false;
    private bool $oneTimeKeyboard          = false;
    private bool $selective                = false;
    private ?string $inputFieldPlaceholder = null;

    public static function make(): self
    {
        return new self();
    }

    public function row(KeyboardButton|string ...$buttons): self
    {
        if ($buttons !== []) {
            $this->rows[] = array_map(
                static fn (KeyboardButton|string $button): KeyboardButton => \is_string($button) ? KeyboardButton::text($button) : $button,
                array_values($buttons)
            );
        }

        return $this;
    }

    public function resize(bool $resize = true): self
    {
        $this->resizeKeyboard = $resize;

        return $this;
    }

    public function oneTime(bool $oneTime = true): self
    {
        $this->oneTimeKeyboard = $oneTime;

        return $this;
    }

    public function selective(bool $selective = true): self
    {
        $this->selective = $selective;

        return $this;
    }

    public function placeholder(string $placeholder): self
    {
        $this->inputFieldPlaceholder = $placeholder;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $keyboard = [
            'keyboard' => array_map(
                static fn (array $row): array => array_map(
                    static fn (KeyboardButton $button): array => $button->jsonSerialize(),
                    $row
                ),
                $this->rows
            ),
        ];

        if ($this->resizeKeyboard) {
            $keyboard['resize_keyboard'] = true;
        }

        if ($this->oneTimeKeyboard) {
            $keyboard['one_time_keyboard'] = true;
        }

        if ($this->selective) {
            $keyboard['selective'] = true;
        }

        if ($this->inputFieldPlaceholder !== null) {
            $keyboard['input_field_placeholder'] = $this->inputFieldPlaceholder;
        }

        return $keyboard;
    }
}
