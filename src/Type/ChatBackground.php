<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class ChatBackground
{
    public function __construct(
        public BackgroundType $type,
        public array          $raw  = []
    )
    {
    }
}
