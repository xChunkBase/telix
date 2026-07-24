<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class Poll
{
    public function __construct(
        public string     $id,
        public string     $question,
        #[ArrayOf(PollOption::class)]
        public array      $options,
        public int        $totalVoterCount,
        public bool       $isClosed,
        public bool       $isAnonymous,
        public string     $type,
        public bool       $allowsMultipleAnswers,
        public bool       $allowsRevoting,
        public bool       $membersOnly,
        #[ArrayOf(MessageEntity::class)]
        public ?array     $questionEntities      = null,
        public ?array     $countryCodes          = null,
        public ?array     $correctOptionIds      = null,
        public ?string    $explanation           = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array     $explanationEntities   = null,
        public ?PollMedia $explanationMedia      = null,
        public ?int       $openPeriod            = null,
        public ?int       $closeDate             = null,
        public ?string    $description           = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array     $descriptionEntities   = null,
        public ?PollMedia $media                 = null,
        public array      $raw                   = []
    )
    {
    }
}
