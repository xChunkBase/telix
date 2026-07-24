<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class Contact
{
    public function __construct(
        public string  $phoneNumber,
        public string  $firstName,
        public ?string $lastName    = null,
        public ?int    $userId      = null,
        public ?string $vcard       = null,
        public array   $raw         = []
    )
    {
    }
}
