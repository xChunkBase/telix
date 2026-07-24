<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class BotCommand implements \JsonSerializable
{
    public function __construct(
        public string $command,
        public string $description
    )
    {
    }

    public function jsonSerialize(): array
    {
        return ['command' => $this->command, 'description' => $this->description];
    }
}
