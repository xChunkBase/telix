<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Type\Enum\ChatType;

final readonly class Chat
{
    public function __construct(
        public int      $id,
        public ChatType $type,
        public ?string  $title     = null,
        public ?string  $username  = null,
        public ?string  $firstName = null,
        public ?string  $lastName  = null,
        public ?bool    $isForum   = null
    )
    {
    }

    public function displayName(): string
    {
        if ($this->title !== null) {
            return $this->title;
        }

        if ($this->firstName !== null) {
            return $this->lastName === null ? $this->firstName : "{$this->firstName} {$this->lastName}";
        }

        return (string) $this->id;
    }
}
