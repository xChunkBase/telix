<?php
declare(strict_types=1);

namespace Telix\Keyboard;

final readonly class ForceReply implements \JsonSerializable
{
    private function __construct(
        private ?string $placeholder,
        private bool    $selective
    )
    {
    }

    public static function make(?string $placeholder = null, bool $selective = false): self
    {
        return new self($placeholder, $selective);
    }

    public function jsonSerialize(): array
    {
        $data = ['force_reply' => true];

        if ($this->placeholder !== null) {
            $data['input_field_placeholder'] = $this->placeholder;
        }

        if ($this->selective) {
            $data['selective'] = true;
        }

        return $data;
    }
}
