<?php
declare(strict_types=1);

namespace Telix\Client\Transport;

use Psr\Log\NullLogger;
use Telix\Type\InputFile;
use Telix\Client\Progress;
use Telix\Client\Direction;
use Psr\Log\LoggerInterface;
use Telix\Client\ClientInterface;
use Telix\Exception\ApiException;
use Telix\Method\MethodInterface;
use Telix\Serialization\Hydrator;
use Telix\Exception\TelixException;
use Telix\Serialization\Normalizer;
use Telix\Exception\TransportException;
use Telix\Exception\SerializationException;

final class CurlTransport implements ClientInterface, FileTransportInterface
{
    private ?\CurlShareHandle $share = null;

    public function __construct(
        #[\SensitiveParameter]
        private readonly string          $token,
        private readonly string          $baseUri        = 'https://api.telegram.org',
        private readonly RetryPolicy     $retryPolicy    = new RetryPolicy(),
        private readonly LoggerInterface $logger         = new NullLogger(),
        private readonly int             $connectTimeout = 30,
        private readonly int             $stallTimeout   = 120
    )
    {
        if (!\extension_loaded('curl')) {
            throw new \LogicException('The Telix cURL transport requires the "curl" PHP extension.');
        }
    }

    public function call(MethodInterface $method, ?callable $onProgress = null): mixed
    {
        $attempt = 0;

        while (true) {
            ++$attempt;

            try {
                return $this->execute($method, $onProgress);
            } catch (TelixException $exception) {
                if (!$this->retryPolicy->shouldRetry($exception, $attempt)) {
                    throw $exception;
                }

                $delayMs = $this->retryPolicy->delayMs($exception, $attempt);
                $this->logger->warning('Telegram call {method} failed (attempt {attempt}), retrying in {delay}ms: {error}', [
                    'method'  => $method->apiName(),
                    'attempt' => $attempt,
                    'delay'   => $delayMs,
                    'error'   => $exception->getMessage(),
                ]);
                usleep($delayMs * 1000);
            }
        }
    }

    public function fileUrl(string $filePath): string
    {
        return "{$this->baseUri}/file/bot{$this->token}/{$filePath}";
    }

    public function download(string $filePath, string $dest, ?callable $onProgress = null): int
    {
        $handle = fopen($dest, 'wb');

        if ($handle === false) {
            throw new TransportException("Could not open destination for writing: {$dest}");
        }

        $curl = $this->handle($this->fileUrl($filePath));
        curl_setopt_array($curl, [
            \CURLOPT_FILE           => $handle,
            \CURLOPT_FOLLOWLOCATION => true,
            \CURLOPT_FAILONERROR    => true,
        ]);
        $this->attachProgress($curl, $onProgress, Direction::Download);

        $ok    = curl_exec($curl);
        $error = curl_error($curl);
        fclose($handle);

        if ($ok === false) {
            @unlink($dest);
            throw new TransportException($this->redact("File download failed: {$error}"));
        }

        return (int) (filesize($dest) ?: 0);
    }

    private function execute(MethodInterface $method, ?callable $onProgress): mixed
    {
        $payload  = Normalizer::payload($method->payload());
        $hasFiles = false;

        foreach ($payload as $value) {
            if ($value instanceof InputFile) {
                $hasFiles = true;
                break;
            }
        }

        $temps = [];
        $curl  = $this->handle("{$this->baseUri}/bot{$this->token}/{$method->apiName()}");
        curl_setopt_array($curl, [
            \CURLOPT_POST           => true,
            \CURLOPT_RETURNTRANSFER => true,
        ]);

        try {
            if ($hasFiles) {
                [$fields, $temps] = $this->multipartFields($payload);
                curl_setopt($curl, \CURLOPT_POSTFIELDS, $fields);
                $this->attachProgress($curl, $onProgress, Direction::Upload);
            } else {
                curl_setopt($curl, \CURLOPT_POSTFIELDS, json_encode($payload, \JSON_UNESCAPED_UNICODE | \JSON_THROW_ON_ERROR));
                curl_setopt($curl, \CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            }

            $body   = curl_exec($curl);
            $error  = curl_error($curl);
            $status = (int) curl_getinfo($curl, \CURLINFO_RESPONSE_CODE);

            if ($body === false) {
                throw new TransportException($this->redact($error));
            }

            return $this->parse((string) $body, $status, $method);
        } finally {
            foreach ($temps as $temp) {
                @unlink($temp);
            }
        }
    }

    private function parse(string $body, int $status, MethodInterface $method): mixed
    {
        $decoded = json_decode($body, true);

        if (!\is_array($decoded) || !\array_key_exists('ok', $decoded)) {
            throw new SerializationException(sprintf(
                'Unexpected response from Telegram (HTTP %d): %s',
                $status,
                $this->redact(mb_substr($body, 0, 256))
            ));
        }

        if ($decoded['ok'] === true) {
            return Hydrator::hydrate($method->responseType(), $decoded['result'] ?? null);
        }

        $parameters = $decoded['parameters'] ?? null;

        throw ApiException::create(
            (int) ($decoded['error_code'] ?? 0),
            (string) ($decoded['description'] ?? 'Unknown Telegram error'),
            \is_array($parameters) ? $parameters : []
        );
    }

    private function multipartFields(array $payload): array
    {
        $fields = [];
        $temps  = [];

        foreach ($payload as $name => $value) {
            if ($value instanceof InputFile) {
                $path = $value->path();

                if ($path === null) {
                    $path = (string) tempnam(sys_get_temp_dir(), 'telix');
                    file_put_contents($path, $value->contents());
                    $temps[] = $path;
                }

                $fields[$name] = new \CURLFile($path, 'application/octet-stream', $value->filename);
                continue;
            }

            $fields[$name] = match (true) {
                \is_array($value) => json_encode($value, \JSON_UNESCAPED_UNICODE | \JSON_THROW_ON_ERROR),
                \is_bool($value)  => $value ? 'true' : 'false',
                default           => (string) $value,
            };
        }

        return [$fields, $temps];
    }

    private function attachProgress(\CurlHandle $curl, ?callable $onProgress, Direction $direction): void
    {
        if ($onProgress === null) {
            return;
        }

        curl_setopt($curl, \CURLOPT_NOPROGRESS, false);
        curl_setopt($curl, \CURLOPT_XFERINFOFUNCTION, static function (
            \CurlHandle $handle,
            int         $downloadTotal,
            int         $downloaded,
            int         $uploadTotal,
            int         $uploaded
        ) use ($onProgress, $direction): int {
            [$total, $sent] = $direction === Direction::Upload
                ? [$uploadTotal, $uploaded]
                : [$downloadTotal, $downloaded];

            if ($total > 0 || $sent > 0) {
                $onProgress(new Progress($direction, $sent, $total));
            }

            return 0;
        });
    }

    private function handle(string $url): \CurlHandle
    {
        $curl = curl_init($url);

        if ($curl === false) {
            throw new TransportException('Could not initialize a cURL handle.');
        }

        curl_setopt_array($curl, [
            \CURLOPT_CONNECTTIMEOUT  => $this->connectTimeout,
            \CURLOPT_LOW_SPEED_LIMIT => 1,
            \CURLOPT_LOW_SPEED_TIME  => $this->stallTimeout,
            \CURLOPT_SHARE           => $this->share(),
        ]);

        return $curl;
    }

    private function share(): \CurlShareHandle
    {
        if ($this->share === null) {
            $share = curl_share_init();
            curl_share_setopt($share, \CURLSHOPT_SHARE, \CURL_LOCK_DATA_DNS);
            curl_share_setopt($share, \CURLSHOPT_SHARE, \CURL_LOCK_DATA_SSL_SESSION);
            $this->share = $share;
        }

        return $this->share;
    }

    private function redact(string $message): string
    {
        return str_replace($this->token, '***TOKEN***', $message);
    }
}
