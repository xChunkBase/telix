<?php
declare(strict_types=1);

namespace Telix\Type;

use Telix\Serialization\ArrayOf;

final readonly class InputRichBlockSlideshow
{
    public function __construct(
        public string            $type,
        #[ArrayOf(InputRichBlock::class)]
        public array             $blocks,
        public ?RichBlockCaption $caption = null,
        public array             $raw     = []
    )
    {
    }
}
