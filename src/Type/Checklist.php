<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class Checklist
{
    public function __construct(
        public string $title,
        #[ArrayOf(ChecklistTask::class)]
        public array  $tasks,
        #[ArrayOf(MessageEntity::class)]
        public ?array $titleEntities            = null,
        public ?bool  $othersCanAddTasks        = null,
        public ?bool  $othersCanMarkTasksAsDone = null,
        public array  $raw                      = []
    )
    {
    }
}
