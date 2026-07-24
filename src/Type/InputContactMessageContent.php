<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputContactMessageContent
{
    public function __construct(
        public string  $phoneNumber,
        public string  $firstName,
        public ?string $lastName    = null,
        public ?string $vcard       = null,
        public array   $raw         = []
    )
    {
    }
}
