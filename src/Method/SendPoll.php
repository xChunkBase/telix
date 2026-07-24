<?php
declare(strict_types=1);

namespace Telix\Method;

use Telix\Client\ResponseMap;

trait SendPoll
{
    public function sendPoll(
        int|string $chatId,
        string     $question,
        array      $options,
        ?string    $businessConnectionId   = null,
        ?int       $messageThreadId        = null,
        ?string    $questionParseMode      = null,
        ?array     $questionEntities       = null,
        ?bool      $isAnonymous            = null,
        ?string    $type                   = null,
        ?bool      $allowsMultipleAnswers  = null,
        ?bool      $allowsRevoting         = null,
        ?bool      $shuffleOptions         = null,
        ?bool      $allowAddingOptions     = null,
        ?bool      $hideResultsUntilCloses = null,
        ?bool      $membersOnly            = null,
        ?array     $countryCodes           = null,
        ?array     $correctOptionIds       = null,
        ?string    $explanation            = null,
        ?string    $explanationParseMode   = null,
        ?array     $explanationEntities    = null,
        mixed      $explanationMedia       = null,
        ?int       $openPeriod             = null,
        ?int       $closeDate              = null,
        ?bool      $isClosed               = null,
        ?string    $description            = null,
        ?string    $descriptionParseMode   = null,
        ?array     $descriptionEntities    = null,
        mixed      $media                  = null,
        ?bool      $disableNotification    = null,
        ?bool      $protectContent         = null,
        ?bool      $allowPaidBroadcast     = null,
        ?string    $messageEffectId        = null,
        mixed      $replyParameters        = null,
        mixed      $replyMarkup            = null
    ): \Telix\Type\Message
    {
        return $this->call(new RawMethod('sendPoll', [
            'chat_id'                   => $chatId,
            'question'                  => $question,
            'options'                   => $options,
            'business_connection_id'    => $businessConnectionId,
            'message_thread_id'         => $messageThreadId,
            'question_parse_mode'       => $questionParseMode,
            'question_entities'         => $questionEntities,
            'is_anonymous'              => $isAnonymous,
            'type'                      => $type,
            'allows_multiple_answers'   => $allowsMultipleAnswers,
            'allows_revoting'           => $allowsRevoting,
            'shuffle_options'           => $shuffleOptions,
            'allow_adding_options'      => $allowAddingOptions,
            'hide_results_until_closes' => $hideResultsUntilCloses,
            'members_only'              => $membersOnly,
            'country_codes'             => $countryCodes,
            'correct_option_ids'        => $correctOptionIds,
            'explanation'               => $explanation,
            'explanation_parse_mode'    => $explanationParseMode,
            'explanation_entities'      => $explanationEntities,
            'explanation_media'         => $explanationMedia,
            'open_period'               => $openPeriod,
            'close_date'                => $closeDate,
            'is_closed'                 => $isClosed,
            'description'               => $description,
            'description_parse_mode'    => $descriptionParseMode,
            'description_entities'      => $descriptionEntities,
            'media'                     => $media,
            'disable_notification'      => $disableNotification,
            'protect_content'           => $protectContent,
            'allow_paid_broadcast'      => $allowPaidBroadcast,
            'message_effect_id'         => $messageEffectId,
            'reply_parameters'          => $replyParameters,
            'reply_markup'              => $replyMarkup,
        ], ResponseMap::of('sendPoll')));
    }
}
