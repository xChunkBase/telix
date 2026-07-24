<?php
declare(strict_types=1);

namespace Telix\Update\LongPolling;

use Psr\Log\NullLogger;
use Telix\Client\BotApi;
use Psr\Log\LoggerInterface;
use Telix\Exception\TelixException;
use Telix\Exception\ConflictException;
use Telix\Update\UpdateSourceInterface;
use Telix\Exception\UnauthorizedException;

final class LongPollingSource implements UpdateSourceInterface
{
    private bool $running = false;
    private ?int $offset  = null;

    public function __construct(
        private readonly BotApi          $api,
        private readonly int             $timeout           = 30,
        private readonly int             $limit             = 100,
        private readonly ?array          $allowedUpdates    = null,
        private readonly int             $retryDelaySeconds = 5,
        private readonly LoggerInterface $logger            = new NullLogger(),
        private readonly ?\Closure       $onTick            = null
    )
    {
    }

    public function updates(): \Generator
    {
        $this->running = true;
        $this->registerSignalHandlers();
        $this->logger->info('Long polling started (timeout {timeout}s).', ['timeout' => $this->timeout]);

        while ($this->isRunning()) {
            try {
                $updates = $this->api->getUpdates($this->offset, $this->limit, $this->timeout, $this->allowedUpdates);
            } catch (UnauthorizedException|ConflictException $exception) {
                throw $exception;
            } catch (TelixException $exception) {
                $this->logger->warning('Polling failed, retrying in {delay}s: {error}', [
                    'delay' => $this->retryDelaySeconds,
                    'error' => $exception->getMessage(),
                ]);
                sleep($this->retryDelaySeconds);
                continue;
            }

            foreach ($updates as $update) {
                $this->offset = $update->updateId + 1;
                yield $update;

                if (!$this->isRunning()) {
                    break;
                }
            }

            if ($this->onTick !== null) {
                ($this->onTick)();
            }
        }

        $this->logger->info('Long polling stopped.');
    }

    public function stop(): void
    {
        $this->running = false;
    }

    private function isRunning(): bool
    {
        return $this->running;
    }

    private function registerSignalHandlers(): void
    {
        if (!\function_exists('pcntl_async_signals') || !\function_exists('pcntl_signal')) {
            return;
        }

        pcntl_async_signals(true);

        foreach ([\SIGINT, \SIGTERM] as $signal) {
            pcntl_signal($signal, function (): void {
                $this->logger->info('Shutdown signal received, finishing current batch…');
                $this->stop();
            });
        }
    }
}
