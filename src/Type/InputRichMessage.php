<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputRichMessage
{
    public function __construct(
        #[ArrayOf(InputRichBlock::class)]
        public ?array  $blocks              = null,
        public ?string $html                = null,
        public ?string $markdown            = null,
        #[ArrayOf(InputRichMessageMedia::class)]
        public ?array  $media               = null,
        public ?bool   $isRtl               = null,
        public ?bool   $skipEntityDetection = null,
        public array   $raw                 = []
    )
    {
    }
}
