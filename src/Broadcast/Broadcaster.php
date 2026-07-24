<?php
declare(strict_types=1);

namespace Telix\Broadcast;

use Psr\Log\NullLogger;
use Telix\Client\BotApi;
use Psr\Log\LoggerInterface;
use Telix\Type\Enum\ParseMode;
use Psr\SimpleCache\CacheInterface;
use Telix\Exception\TelixException;
use Telix\Exception\ForbiddenException;

final class Broadcaster
{
    private const CHECKPOINT_EVERY = 20;

    public function __construct(
        private readonly BotApi          $api,
        private readonly ?CacheInterface $cache             = null,
        private readonly LoggerInterface $logger            = new NullLogger(),
        private readonly int             $messagesPerSecond = 25
    )
    {
    }

    public function text(
        iterable   $chatIds,
        string     $text,
        ?ParseMode $parseMode   = null,
        mixed      $replyMarkup = null,
        ?string    $resumeId    = null,
        ?\Closure  $onProgress  = null
    ): BroadcastReport
    {
        return $this->broadcast(
            $chatIds,
            fn (int|string $chatId) => $this->api->sendMessage($chatId, $text, $parseMode, $replyMarkup),
            $resumeId,
            $onProgress
        );
    }

    public function broadcast(
        iterable  $chatIds,
        \Closure  $send,
        ?string   $resumeId   = null,
        ?\Closure $onProgress = null
    ): BroadcastReport
    {
        $total = is_countable($chatIds) ? \count($chatIds) : null;

        $delayMicroseconds = (int) (1_000_000 / max(1, $this->messagesPerSecond));

        $checkpoint = $this->loadCheckpoint($resumeId);
        $skipped    = $checkpoint['done'];
        $sent       = $checkpoint['sent'];
        $blocked    = $checkpoint['blocked'];
        $failed     = $checkpoint['failed'];

        $position = 0;

        foreach ($chatIds as $chatId) {
            if ($position++ < $checkpoint['done']) {
                continue;
            }

            try {
                $send($chatId, $this->api);
                ++$sent;
            } catch (ForbiddenException) {
                ++$blocked;
            } catch (TelixException $exception) {
                ++$failed;
                $this->logger->warning('Broadcast to {chat} failed: {error}', [
                    'chat'  => $chatId,
                    'error' => $exception->getMessage(),
                ]);
            }

            if ($position % self::CHECKPOINT_EVERY === 0) {
                $this->saveCheckpoint($resumeId, $position, $sent, $blocked, $failed);

                if ($onProgress !== null) {
                    $onProgress($position, $total);
                }
            }

            usleep($delayMicroseconds);
        }

        $this->clearCheckpoint($resumeId);

        if ($onProgress !== null) {
            $onProgress($position, $total);
        }

        return new BroadcastReport($sent, $blocked, $failed, $skipped);
    }

    private function loadCheckpoint(?string $resumeId): array
    {
        $empty = ['done' => 0, 'sent' => 0, 'blocked' => 0, 'failed' => 0];

        if ($resumeId === null || $this->cache === null) {
            return $empty;
        }

        $saved = $this->cache->get('telix.broadcast.' . $resumeId);

        return \is_array($saved) ? array_merge($empty, $saved) : $empty;
    }

    private function saveCheckpoint(?string $resumeId, int $done, int $sent, int $blocked, int $failed): void
    {
        if ($resumeId !== null && $this->cache !== null) {
            $this->cache->set(
                'telix.broadcast.' . $resumeId,
                ['done' => $done, 'sent' => $sent, 'blocked' => $blocked, 'failed' => $failed],
                86_400
            );
        }
    }

    private function clearCheckpoint(?string $resumeId): void
    {
        if ($resumeId !== null && $this->cache !== null) {
            $this->cache->delete('telix.broadcast.' . $resumeId);
        }
    }
}
