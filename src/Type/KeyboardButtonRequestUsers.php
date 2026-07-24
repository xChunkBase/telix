<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class KeyboardButtonRequestUsers
{
    public function __construct(
        public int   $requestId,
        public ?bool $userIsBot       = null,
        public ?bool $userIsPremium   = null,
        public ?int  $maxQuantity     = null,
        public ?bool $requestName     = null,
        public ?bool $requestUsername = null,
        public ?bool $requestPhoto    = null,
        public array $raw             = []
    )
    {
    }
}
