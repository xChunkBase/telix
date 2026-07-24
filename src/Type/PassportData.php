<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class PassportData
{
    public function __construct(
        #[ArrayOf(EncryptedPassportElement::class)]
        public array                $data,
        public EncryptedCredentials $credentials,
        public array                $raw         = []
    )
    {
    }
}
