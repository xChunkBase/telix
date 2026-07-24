<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;
use Telix\Type\Enum\UpdateType;

final class UpdateIs extends Filter
{
    private readonly array $types;

    public function __construct(UpdateType ...$types)
    {
        $this->types = $types;
    }

    public function matches(Context $ctx): bool
    {
        return \in_array($ctx->update->type(), $this->types, true);
    }
}
