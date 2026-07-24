<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendInvoice
{
    public function sendInvoice(
        int|string $chatId,
        string     $title,
        string     $description,
        string     $payload,
        string     $currency,
        array      $prices,
        ?int       $messageThreadId           = null,
        ?int       $directMessagesTopicId     = null,
        ?string    $providerToken             = null,
        ?int       $maxTipAmount              = null,
        ?array     $suggestedTipAmounts       = null,
        ?string    $startParameter            = null,
        ?string    $providerData              = null,
        ?string    $photoUrl                  = null,
        ?int       $photoSize                 = null,
        ?int       $photoWidth                = null,
        ?int       $photoHeight               = null,
        ?bool      $needName                  = null,
        ?bool      $needPhoneNumber           = null,
        ?bool      $needEmail                 = null,
        ?bool      $needShippingAddress       = null,
        ?bool      $sendPhoneNumberToProvider = null,
        ?bool      $sendEmailToProvider       = null,
        ?bool      $isFlexible                = null,
        ?bool      $disableNotification       = null,
        ?bool      $protectContent            = null,
        ?bool      $allowPaidBroadcast        = null,
        ?string    $messageEffectId           = null,
        mixed      $suggestedPostParameters   = null,
        mixed      $replyParameters           = null,
        mixed      $replyMarkup               = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendInvoice', [
            'chat_id'                       => $chatId,
            'title'                         => $title,
            'description'                   => $description,
            'payload'                       => $payload,
            'currency'                      => $currency,
            'prices'                        => $prices,
            'message_thread_id'             => $messageThreadId,
            'direct_messages_topic_id'      => $directMessagesTopicId,
            'provider_token'                => $providerToken,
            'max_tip_amount'                => $maxTipAmount,
            'suggested_tip_amounts'         => $suggestedTipAmounts,
            'start_parameter'               => $startParameter,
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
            'disable_notification'          => $disableNotification,
            'protect_content'               => $protectContent,
            'allow_paid_broadcast'          => $allowPaidBroadcast,
            'message_effect_id'             => $messageEffectId,
            'suggested_post_parameters'     => $suggestedPostParameters,
            'reply_parameters'              => $replyParameters,
            'reply_markup'                  => $replyMarkup,
        ], ResponseMap::of('sendInvoice')));
    }
}
