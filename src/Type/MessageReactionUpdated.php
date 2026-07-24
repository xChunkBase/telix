<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class MessageReactionUpdated
{
    public function __construct(
        public Chat  $chat,
        public int   $messageId,
        public int   $date,
        public array $oldReaction = [],
        public array $newReaction = [],
        public ?User $user        = null,
        public ?Chat $actorChat   = null
    )
    {
    }

    public function added(): array
    {
        $emoji = static fn (array $reactions): array => array_values(array_filter(array_map(
            static fn (array $r): ?string => $r['emoji'] ?? null,
            $reactions
        )));

        return array_values(array_diff($emoji($this->newReaction), $emoji($this->oldReaction)));
    }
}
