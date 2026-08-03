<?php
declare(strict_types=1);

namespace Telix\Bot\Filter;

use Telix\Bot\Context;
use Telix\Routing\Pattern;
use Telix\Conversation\StateStore;

final class StepIs extends Filter
{
    /**
     * @param non-empty-string $regex
     */
    private function __construct(
        private readonly StateStore $store,
        private readonly string     $regex,
        private readonly array      $names = []
    )
    {
    }

    public static function exact(StateStore $store, string $step): self
    {
        return new self($store, '~^' . preg_quote($step, '~') . '$~u');
    }

    public static function pattern(StateStore $store, string $pattern): self
    {
        $compiled = Pattern::compile($pattern);

        return new self($store, $compiled['regex'], $compiled['names']);
    }

    public function matches(Context $ctx): bool
    {
        $userId = $ctx->from()?->id;

        if ($userId === null) {
            return false;
        }

        $step = $this->store->step($userId);

        if ($step === null || preg_match($this->regex, $step, $matches) !== 1) {
            return false;
        }

        foreach ($this->names as $name) {
            $ctx->setParam($name, $matches[$name] ?? null);
        }

        $ctx->setParam('state', $this->store->data($userId));

        return true;
    }
}
