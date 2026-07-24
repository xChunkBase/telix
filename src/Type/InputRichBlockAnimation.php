<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class InputRichBlockAnimation
{
    public function __construct(
        public string              $type,
        public InputMediaAnimation $animation,
        public ?RichBlockCaption   $caption   = null,
        public array               $raw       = []
    )
    {
    }
}
