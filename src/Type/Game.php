<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class Game
{
    public function __construct(
        public string     $title,
        public string     $description,
        #[ArrayOf(PhotoSize::class)]
        public array      $photo,
        public ?string    $text         = null,
        #[ArrayOf(MessageEntity::class)]
        public ?array     $textEntities = null,
        public ?Animation $animation    = null,
        public array      $raw          = []
    )
    {
    }
}
