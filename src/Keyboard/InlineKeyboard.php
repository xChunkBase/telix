<?php
declare(strict_types=1);

namespace Telix\Keyboard;

final class InlineKeyboard implements \JsonSerializable
{
    private array $rows = [];

    public static function make(): self
    {
        return new self();
    }

    public function row(Button ...$buttons): self
    {
        if ($buttons !== []) {
            $this->rows[] = array_values($buttons);
        }

        return $this;
    }

    public function grid(array $buttons, int $columns = 2): self
    {
        foreach (array_chunk(array_values($buttons), max(1, $columns)) as $chunk) {
            $this->rows[] = $chunk;
        }

        return $this;
    }

    public function isEmpty(): bool
    {
        return $this->rows === [];
    }

    public function jsonSerialize(): array
    {
        return [
            'inline_keyboard' => array_map(
                static fn (array $row): array => array_map(
                    static fn (Button $button): array => $button->jsonSerialize(),
                    $row
                ),
                $this->rows
            ),
        ];
    }
}
