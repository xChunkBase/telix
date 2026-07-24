<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichTextDateTime
{
    public function __construct(
        public string   $type,
        public RichText $text,
        public int      $unixTime,
        public string   $dateTimeFormat,
        public array    $raw            = []
    )
    {
    }
}
