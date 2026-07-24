<?php
declare(strict_types=1);

namespace Telix\Client\Transport;

use Psr\Log\NullLogger;
use Telix\Type\InputFile;
use Psr\Log\LoggerInterface;
use Telix\Client\ClientInterface;
use Telix\Exception\ApiException;
use Telix\Method\MethodInterface;
use Telix\Serialization\Hydrator;
use Telix\Exception\TelixException;
use Telix\Serialization\Normalizer;
use Psr\Http\Message\RequestInterface;
use Telix\Exception\TransportException;
use Telix\Exception\SerializationException;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Client\ClientInterface as HttpClientInterface;

final class Psr18Transport implements ClientInterface
{
    public function __construct(
        private readonly HttpClientInterface     $http,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface  $streamFactory,
        #[\SensitiveParameter]
        private readonly string                  $token,
        private readonly string                  $baseUri        = 'https://api.telegram.org',
        private readonly RetryPolicy             $retryPolicy    = new RetryPolicy(),
        private readonly LoggerInterface         $logger         = new NullLogger()
    )
    {
    }

    public function call(MethodInterface $method): mixed
    {
        $attempt = 0;

        while (true) {
            ++$attempt;

            try {
                return $this->execute($method);
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

    private function execute(MethodInterface $method): mixed
    {
        $payload = Normalizer::payload($method->payload());
        $request = $this->createRequest($method->apiName(), $payload);

        try {
            $response = $this->http->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new TransportException($this->redact($exception->getMessage()), 0, $exception);
        }

        $body    = (string) $response->getBody();
        $decoded = json_decode($body, true);

        if (!\is_array($decoded) || !\array_key_exists('ok', $decoded)) {
            throw new SerializationException(sprintf(
                'Unexpected response from Telegram (HTTP %d): %s',
                $response->getStatusCode(),
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

    private function createRequest(string $apiName, array $payload): RequestInterface
    {
        $request = $this->requestFactory->createRequest('POST', "{$this->baseUri}/bot{$this->token}/{$apiName}");

        $hasFiles = false;

        foreach ($payload as $value) {
            if ($value instanceof InputFile) {
                $hasFiles = true;
                break;
            }
        }

        if (!$hasFiles) {
            return $request
                ->withHeader('Content-Type', 'application/json')
                ->withBody($this->streamFactory->createStream(
                    json_encode($payload, \JSON_UNESCAPED_UNICODE | \JSON_THROW_ON_ERROR)
                ));
        }

        $boundary = 'telix' . bin2hex(random_bytes(16));

        return $request
            ->withHeader('Content-Type', "multipart/form-data; boundary={$boundary}")
            ->withBody($this->streamFactory->createStream($this->multipartBody($payload, $boundary)));
    }

    private function multipartBody(array $payload, string $boundary): string
    {
        $body = '';

        foreach ($payload as $name => $value) {
            $body .= "--{$boundary}\r\n";

            if ($value instanceof InputFile) {
                $filename = str_replace(['"', "\r", "\n"], '', $value->filename);
                $body .= "Content-Disposition: form-data; name=\"{$name}\"; filename=\"{$filename}\"\r\n";
                $body .= "Content-Type: application/octet-stream\r\n\r\n";
                $body .= $value->contents() . "\r\n";
                continue;
            }

            $body .= "Content-Disposition: form-data; name=\"{$name}\"\r\n\r\n";
            $body .= match (true) {
                \is_array($value) => json_encode($value, \JSON_UNESCAPED_UNICODE | \JSON_THROW_ON_ERROR),
                \is_bool($value)  => $value ? 'true' : 'false',
                default           => (string) $value,
            };
            $body .= "\r\n";
        }

        return $body . "--{$boundary}--\r\n";
    }

    private function redact(string $message): string
    {
        return str_replace($this->token, '***TOKEN***', $message);
    }
}
