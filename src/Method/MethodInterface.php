<?php
declare(strict_types=1);

namespace Telix\Method;

interface MethodInterface
{
    public function apiName(): string;

    public function payload(): array;

    public function responseType(): string;
}
