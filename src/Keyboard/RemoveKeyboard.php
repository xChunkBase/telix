<?php
declare(strict_types=1);

namespace Telix\Keyboard;

final readonly class RemoveKeyboard implements \JsonSerializable
{
    private function __construct(
        private bool $selective
    )
    {
    }

    public static function make(bool $selective = false): self
    {
        return new self($selective);
    }

    public function jsonSerialize(): array
    {
        $data = ['remove_keyboard' => true];

        if ($this->selective) {
            $data['selective'] = true;
        }

        return $data;
    }
}
