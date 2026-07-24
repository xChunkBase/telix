<?php
declare(strict_types=1);

namespace Telix\Keyboard;

final readonly class Button implements \JsonSerializable
{
    private function __construct(
        private array $data
    )
    {
    }

    public static function callback(string $text, string $data): self
    {
        if (\strlen($data) > 64) {
            throw new \InvalidArgumentException('Telegram limits callback data to 64 bytes, got ' . \strlen($data) . '.');
        }

        return new self(['text' => $text, 'callback_data' => $data]);
    }

    public static function url(string $text, string $url): self
    {
        return new self(['text' => $text, 'url' => $url]);
    }

    public static function webApp(string $text, string $url): self
    {
        return new self(['text' => $text, 'web_app' => ['url' => $url]]);
    }

    public static function switchInline(string $text, string $query = ''): self
    {
        return new self(['text' => $text, 'switch_inline_query' => $query]);
    }

    public static function switchInlineCurrentChat(string $text, string $query = ''): self
    {
        return new self(['text' => $text, 'switch_inline_query_current_chat' => $query]);
    }

    public function jsonSerialize(): array
    {
        return $this->data;
    }
}
