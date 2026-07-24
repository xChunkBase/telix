<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputInvoiceMessageContent
{
    public function __construct(
        public string  $title,
        public string  $description,
        public string  $payload,
        public string  $currency,
        #[ArrayOf(LabeledPrice::class)]
        public array   $prices,
        public ?string $providerToken             = null,
        public ?int    $maxTipAmount              = null,
        public ?array  $suggestedTipAmounts       = null,
        public ?string $providerData              = null,
        public ?string $photoUrl                  = null,
        public ?int    $photoSize                 = null,
        public ?int    $photoWidth                = null,
        public ?int    $photoHeight               = null,
        public ?bool   $needName                  = null,
        public ?bool   $needPhoneNumber           = null,
        public ?bool   $needEmail                 = null,
        public ?bool   $needShippingAddress       = null,
        public ?bool   $sendPhoneNumberToProvider = null,
        public ?bool   $sendEmailToProvider       = null,
        public ?bool   $isFlexible                = null,
        public array   $raw                       = []
    )
    {
    }
}
