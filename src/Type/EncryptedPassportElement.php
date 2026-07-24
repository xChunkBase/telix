<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class EncryptedPassportElement
{
    public function __construct(
        public string        $type,
        public string        $hash,
        public ?string       $data        = null,
        public ?string       $phoneNumber = null,
        public ?string       $email       = null,
        #[ArrayOf(PassportFile::class)]
        public ?array        $files       = null,
        public ?PassportFile $frontSide   = null,
        public ?PassportFile $reverseSide = null,
        public ?PassportFile $selfie      = null,
        #[ArrayOf(PassportFile::class)]
        public ?array        $translation = null,
        public array         $raw         = []
    )
    {
    }
}
