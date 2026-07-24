<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class ChecklistTasksAdded
{
    public function __construct(
        #[ArrayOf(ChecklistTask::class)]
        public array    $tasks,
        public ?Message $checklistMessage = null,
        public array    $raw              = []
    )
    {
    }
}
