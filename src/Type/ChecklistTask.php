<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class ChecklistTask
{
    public function __construct(
        public int    $id,
        public string $text,
        #[ArrayOf(MessageEntity::class)]
        public ?array $textEntities    = null,
        public ?User  $completedByUser = null,
        public ?Chat  $completedByChat = null,
        public ?int   $completionDate  = null,
        public array  $raw             = []
    )
    {
    }
}
