<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class EncryptedCredentials
{
    public function __construct(
        public string $data,
        public string $hash,
        public string $secret,
        public array  $raw    = []
    )
    {
    }
}
