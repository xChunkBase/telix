<?php
declare(strict_types=1);

namespace Telix\Type;

final readonly class RichBlockVoiceNote
{
    public function __construct(
        public string            $type,
        public Voice             $voiceNote,
        public ?RichBlockCaption $caption   = null,
        public array             $raw       = []
    )
    {
    }
}
