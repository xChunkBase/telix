<?php
declare(strict_types=1);

namespace Telix\Keyboard;

final readonly class KeyboardButton implements \JsonSerializable
{
    private function __construct(
        private array $data
    )
    {
    }

    public static function text(string $text): self
    {
        return new self(['text' => $text]);
    }

    public static function requestContact(string $text): self
    {
        return new self(['text' => $text, 'request_contact' => true]);
    }

    public static function requestLocation(string $text): self
    {
        return new self(['text' => $text, 'request_location' => true]);
    }

    public function jsonSerialize(): array
    {
        return $this->data;
    }
}
