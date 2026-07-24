<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;
use Telix\Type\Enum\ChatType;

final class ChatTypeIs extends Filter
{
    private readonly array $types;

    public function __construct(ChatType ...$types)
    {
        $this->types = $types;
    }

    public static function private(): self
    {
        return new self(ChatType::Private);
    }

    public static function group(): self
    {
        return new self(ChatType::Group, ChatType::Supergroup);
    }

    public static function channel(): self
    {
        return new self(ChatType::Channel);
    }

    public function matches(Context $ctx): bool
    {
        $type = $ctx->update->chat()?->type;

        return $type !== null && \in_array($type, $this->types, true);
    }
}
