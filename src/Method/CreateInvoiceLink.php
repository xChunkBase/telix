<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait CreateInvoiceLink
{
    public function createInvoiceLink(
        string  $title,
        string  $description,
        string  $payload,
        string  $currency,
        array   $prices,
        ?string $businessConnectionId      = null,
        ?string $providerToken             = null,
        ?int    $subscriptionPeriod        = null,
        ?int    $maxTipAmount              = null,
        ?array  $suggestedTipAmounts       = null,
        ?string $providerData              = null,
        ?string $photoUrl                  = null,
        ?int    $photoSize                 = null,
        ?int    $photoWidth                = null,
        ?int    $photoHeight               = null,
        ?bool   $needName                  = null,
        ?bool   $needPhoneNumber           = null,
        ?bool   $needEmail                 = null,
        ?bool   $needShippingAddress       = null,
        ?bool   $sendPhoneNumberToProvider = null,
        ?bool   $sendEmailToProvider       = null,
        ?bool   $isFlexible                = null
    ): string
    {
        return $this->call(new RawMethod('createInvoiceLink', [
            'title'                         => $title,
            'description'                   => $description,
            'payload'                       => $payload,
            'currency'                      => $currency,
            'prices'                        => $prices,
            'business_connection_id'        => $businessConnectionId,
            'provider_token'                => $providerToken,
            'subscription_period'           => $subscriptionPeriod,
            'max_tip_amount'                => $maxTipAmount,
            'suggested_tip_amounts'         => $suggestedTipAmounts,
            'provider_data'                 => $providerData,
            'photo_url'                     => $photoUrl,
            'photo_size'                    => $photoSize,
            'photo_width'                   => $photoWidth,
            'photo_height'                  => $photoHeight,
            'need_name'                     => $needName,
            'need_phone_number'             => $needPhoneNumber,
            'need_email'                    => $needEmail,
            'need_shipping_address'         => $needShippingAddress,
            'send_phone_number_to_provider' => $sendPhoneNumberToProvider,
            'send_email_to_provider'        => $sendEmailToProvider,
            'is_flexible'                   => $isFlexible,
        ], ResponseMap::of('createInvoiceLink')));
    }
}
