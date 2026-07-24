<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockCaption
{
    public function __construct(
        public RichText  $text,
        public ?RichText $credit = null,
        public array     $raw    = []
    )
    {
    }
}
