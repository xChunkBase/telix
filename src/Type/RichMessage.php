<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class RichMessage
{
    public function __construct(
        #[ArrayOf(RichBlock::class)]
        public array $blocks,
        public ?bool $isRtl  = null,
        public array $raw    = []
    )
    {
    }
}
