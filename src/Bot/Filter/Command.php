<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;

final class Command extends Filter
{
    private function __construct(
        private readonly string $name
    )
    {
    }

    public static function named(string $name): self
    {
        return new self(strtolower(ltrim($name, '/')));
    }

    public function matches(Context $ctx): bool
    {
        $message = $ctx->update->message;

        if ($message === null || $message->commandName() !== $this->name) {
            return false;
        }

        $ctx->setParam('args', $message->commandArgs());

        return true;
    }
}
