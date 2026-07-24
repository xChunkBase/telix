<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class User
{
    public function __construct(
        public int     $id,
        public bool    $isBot,
        public string  $firstName,
        public ?string $lastName              = null,
        public ?string $username              = null,
        public ?string $languageCode          = null,
        public ?bool   $isPremium             = null,
        public ?bool   $addedToAttachmentMenu = null
    )
    {
    }

    public function fullName(): string
    {
        return $this->lastName === null ? $this->firstName : "{$this->firstName} {$this->lastName}";
    }

    public function htmlMention(?string $label = null): string
    {
        $label = htmlspecialchars($label ?? $this->fullName(), \ENT_QUOTES);

        return sprintf('<a href="tg://user?id=%d">%s</a>', $this->id, $label);
    }
}
