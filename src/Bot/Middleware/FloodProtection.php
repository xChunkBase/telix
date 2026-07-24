<?php
declare(strict_types=1);

namespace Telix\Bot\Middleware;

use Telix\Bot\Context;
use Telix\Memory\Memory;

final class FloodProtection implements MiddlewareInterface
{
    private readonly ?\Closure $onFlood;

    public function __construct(
        private readonly Memory $memory,
        private readonly int    $maxUpdates  = 20,
        private readonly int    $perSeconds  = 10,
        private readonly int    $muteSeconds = 30,
        ?callable               $onFlood     = null
    )
    {
        $this->onFlood = $onFlood === null ? null : $onFlood(...);
    }

    public function process(Context $ctx, \Closure $next): void
    {
        $userId = $ctx->from()?->id;

        if ($userId === null) {
            $next($ctx);

            return;
        }

        if ($this->memory->has("flood.mute.{$userId}")) {
            return;
        }

        if ($this->memory->increment("flood.count.{$userId}", 1, $this->perSeconds) > $this->maxUpdates) {
            $this->memory->set("flood.mute.{$userId}", true, $this->muteSeconds);
            $this->memory->forget("flood.count.{$userId}");
            $this->notify($ctx);

            return;
        }

        $next($ctx);
    }

    private function notify(Context $ctx): void
    {
        try {
            if ($this->onFlood !== null) {
                ($this->onFlood)($ctx, $this->muteSeconds);
            } elseif ($ctx->callbackQuery() !== null) {
                $ctx->toast("⛔ Too fast — try again in {$this->muteSeconds}s.", showAlert: true);
            } else {
                $ctx->reply("⛔ Too fast — you are muted for {$this->muteSeconds} seconds.");
            }
        } catch (\Throwable) {
        }
    }
}
