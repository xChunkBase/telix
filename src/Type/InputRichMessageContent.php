<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichMessageContent
{
    public function __construct(
        public InputRichMessage $richMessage,
        public array            $raw         = []
    )
    {
    }
}
