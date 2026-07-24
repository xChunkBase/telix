<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChecklistTasksDone
{
    public function __construct(
        public ?Message $checklistMessage       = null,
        public ?array   $markedAsDoneTaskIds    = null,
        public ?array   $markedAsNotDoneTaskIds = null,
        public array    $raw                    = []
    )
    {
    }
}
