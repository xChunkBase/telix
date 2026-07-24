<?php
declare(strict_types=1);

namespace Telix\Method;

final readonly class RawMethod implements MethodInterface
{
    public function __construct(
        private string $apiName,
        private array  $payload      = [],
        private string $responseType = 'mixed'
    )
    {
    }

    public function apiName(): string
    {
        return $this->apiName;
    }

    public function payload(): array
    {
        return $this->payload;
    }

    public function responseType(): string
    {
        return $this->responseType;
    }
}
