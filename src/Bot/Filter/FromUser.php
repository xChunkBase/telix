<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;

final class FromUser extends Filter
{
    private readonly array $userIds;

    public function __construct(int ...$userIds)
    {
        $this->userIds = $userIds;
    }

    public function matches(Context $ctx): bool
    {
        $userId = $ctx->update->from()?->id;

        return $userId !== null && \in_array($userId, $this->userIds, true);
    }
}
