<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputChecklist
{
    public function __construct(
        public string  $title,
        #[ArrayOf(InputChecklistTask::class)]
        public array   $tasks,
        public ?string $parseMode                = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array  $titleEntities            = null,
        public ?bool   $othersCanAddTasks        = null,
        public ?bool   $othersCanMarkTasksAsDone = null,
        public array   $raw                      = []
    )
    {
    }
}
